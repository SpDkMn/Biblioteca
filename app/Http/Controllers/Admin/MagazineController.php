<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Para usar el Modelo Magazine
use App\Author as Author;
use App\Magazine as Magazine;
use App\MagazineCopy as MagazineCopy;
use App\Editorial as Editorial;
use App\Content as Content;


class MagazineController extends Controller
{
 	public function index(){
    $editoriales = Editorial::all();
    $autores = Author::all();
    $revistas = Magazine::all();
    $copias_revistas = MagazineCopy::all();
    $contenidos = Content::all();

    //Enviando arreglos -> Autores , editoriales , revistas , copias_revistas
 		$new = view('admin.md_magazines.new',['autores'=>$autores,
                                          'editoriales'=>$editoriales
                                          ]);

    $show = view('admin.md_magazines.show',['revistas'=>$revistas,
                                            'copias_revistas'=>$copias_revistas,
                                            'contenidos'=>$contenidos,
                                            'editoriales'=>$editoriales,
                                            'autores'=>$autores
                                            ]);
    $edit = view('admin.md_magazines.edit',['revistas'=>$revistas,
                                              'copias_revistas'=>$copias_revistas,
                                              'contenidos'=>$contenidos,
                                              'editoriales'=>$editoriales,
                                              'autores'=>$autores
                                              ]);

     return view('admin.md_magazines.index',['new' => $new,
                                            'show'=>$show,
                                            'edit'=>$edit]);
 	}

 	public function create(){

 	}

 	public function store(Request $request){
  //   Validando datos de entrada
  //   $this->validate($request, [
  //     //  'title' => 'required|unique:posts|max:255',
  //      'magazine.issn' => 'required|unique:posts',
  //  ]);
    // fin de la validacions
 		//Almacenamos lo que el usuario ingresa
    $contador_contenido = 0 ;
    $contador_copia = 0 ;

    //gracias while por existir :)
    //Contando los contenidos de la revista
    while($request['titleContent'.$contador_contenido]!=null){
      $contador_contenido ++ ;
    };
    //Contando las copias de la revista
    while($request['clasification'.$contador_copia]!=null){
      $contador_copia ++ ;
    };




    //Guardando los datos de la revista
 		$m = Magazine::create(['title'=>$request['title'],
 		                            'issn'=>$request['issn'],
                                'author_id'=>$request['author']
                                ]);

   //Guardamos los registros de las revistas
    $magazines = Magazine::all();
    //Guardamos los registros de las editoriales para el pivote
    $editoriales = Editorial::all();
    // Capturando id de la revista ingresada
    foreach ($magazines as $magazine) {
      if($magazine->issn == $request['issn']){
        $id_magazine = $magazine->id ;
      };
    };
    //Guardando datos de las copias de revistas
    for ($j=0; $j < $contador_copia; $j++) {
      $mc = MagazineCopy::create(['clasification'=>$request['clasification'.$j],
                                  'incomeNumber'=>$request['incomeNumber'.$j],
                                  'barcode'=>$request['barcode'.$j],
                                  'copy'=>$request['copy'.$j],
                                  'magazine_id'=>$id_magazine
                                  ]);
    }
    //Guardando los titulos de los contenidos de una revista
    //Este bucle tiene que ir antes del bucle que asocia los contenidos y los autores
     for ($i=0; $i<$contador_contenido ; $i++) {
       $c = Content::create(['title'=>$request["titleContent".$i],
                            'magazine_id'=>$id_magazine
                                              ]);
     }
    //RELACIONANDO LAS TABLAS PIVOTES
    //Pivot -> Content - author
    foreach ($magazines as $magazine) {
      if ($magazine->id == $id_magazine) {
          //Recorre los contenidos de cada revista
          $cont = 0 ;
          foreach($magazine->contents as $content){
            //Si el contenido esta relacionado con la revista
            if($content->magazine_id == $id_magazine){
              //recorremos el arreglo con los id de los colaboradores para asociarlos al contenido
                foreach ($request["collaborator".$cont] as $clave => $id) {
                  $content -> authors() -> attach($id);
                };
            };
            $cont = $cont +1 ;
          };
      };
    }
    //Pivot-> Magazine - Editorial
    foreach ($magazines as $magazine) {
      //Recorremos el arreglo con los id de las editoriales seleccionadas para asociarlas a las revistas
      foreach ($request['editorial'] as $clave => $id) {
        if($magazine->id == $id_magazine){
          $magazine-> editorials() -> attach($id);
        }
      }
    };
 		//Redireccionamos a la seccion de revistas
 		return redirect('admin/magazines');
 	}

  public function edit($id){
    $magazine = Magazine::find($id);
    return view('admin.md_magazines.edit',['revista'=>$magazine]);
  }

  public function update(Request $request, $id){
    //Editar los campos que se ha enviado en el formulario para editar
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      // $e = Employee::with('user')->where('id',$id)->first();
      // $e->user->delete();
      // $e->delete();

      $magazine = Magazine::find($id);
      //Eliminando el autor
      dd('Eliminado');
  //     $magazine->author->delete();
  //     $magazine->editorials->delete();
  //     $magazine->contents->delete();
  //     $magazine->delete();
   }

}
