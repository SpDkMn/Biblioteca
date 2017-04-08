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
//Nota: Reducir la funciones al terminar todos los modulos
class MagazineController extends Controller{
  //Terminado
 	public function index(){
    $editoriales = Editorial::all();
    $autores = Author::all();
    $revistas = Magazine::all();
    $copias_revistas = MagazineCopy::all();
    $contenidos = Content::all();

    $delete = view('admin.md_magazines.delete');
 
    $content = view('admin.md_magazines.content',['revistas'=>$revistas,
                                                  'id'=>null]);


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
                                              'autores'=>$autores,
                                              //Definiendo las variables para editar
                                              'id'=>null,
                                              'autores'=>null
                                              ]);

     return view('admin.md_magazines.index',['new' => $new,
                                            'show'=>$show,
                                            'edit'=>$edit,
                                            'delete'=>$delete,
                                            'content'=>$content
                                          ]);
 	}
 	public function create(){
    //Funcion no usada
 	}
  //Terminado
 	public function store(Request $request){
 		//Almacenamos lo que el usuario ingresa
    //Declarando contadores
    $contador_contenido = 0 ;
    $contador_copia = 0 ;
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
  //Terminado
  public function edit($id){
    $revistas = Magazine::all();
    //Contando contenidos y copias de una revista
    // foreach ($revistas as $revista) {
    //   if ($revista->id == $id) {
    //       //Contando la cantidad de contenidos que tiene una revista
    //     foreach ($revista->contents as $contenido) {
    //       $contContent = $contContent + 1 ;
    //     }
    //       //Contando la cantidad de copias que tiene una revista
    //     foreach ($revista->magazines_copies as $item) {
    //       $contItem = $contItem +1 ;
    //     }
    //   }
    // }
    $autores = Author::all();
    $editoriales = Editorial::all();
    return view('admin.md_magazines.edit',['id'=>$id,
                                          'revistas'=>$revistas,
                                          //Para la carga de opciones de editoriales y colaboradores
                                          'editoriales'=>$editoriales,
                                          'autores'=>$autores]);
  }
  public function update(Request $request, $id){
    $revista = Magazine::find($id);
    $copias = MagazineCopy::all();
    $magazines = Magazine::all();
    $contents = Content::all();
    $editoriales = Editorial::all();
    $contador_contenido = 0 ;
    $contador_copia = 0 ;
    // dd($revista->magazines_copies[0],$revista->magazines_copies[1]);
    //********************************************************************************************************
    /* PRUEBAS */
    //********************************************************************************************************
    //Contando los contenidos de la revista
    while($request['titleContent'.$contador_contenido]!=null){
      $contador_contenido ++ ;
    };
    //Contando las copias de la revista
    while($request['clasification'.$contador_copia]!=null){
      $contador_copia ++ ;
    };
    //Actualizando datos de revista
    $revista->title = $request['title'];
    $revista->issn = $request['issn'];
    if(is_string($request['author'])){
      //Convirtiendo a entero el valor de $request['author'], pues es una cadena y al asignarlo guardara 0
      $request['author'] = (int)$request['author'];
    }

    $revista->author_id = $request['author'];

    //Ver porque aparece que $item no existe
    // foreach ($revista->magazines_copies as $item) {
    //   $j = 0 ;
    //   $item->clasification = $request['clasification'.$j];
    //   $item->incomeNumber = $request['incomeNumber'.$j];
    //   $item->barcode = $request['barcode'.$j];
    //   $item->copy = $request['copy'.$j]
    //   $item->magazine_id = $id;
    //   $j = $j +1 ;
    // };

    //Actualizacion de datos de los items
    for ($j=0; $j < $contador_copia ; $j++) {
        $revista->magazines_copies[$j]->clasification = $request['clasification'.$j];
        $revista->magazines_copies[$j]->incomeNumber = $request['incomeNumber'.$j];
        $revista->magazines_copies[$j]->barcode = $request['barcode'.$j];
        $revista->magazines_copies[$j]->copy = $request['copy'.$j];
    };
    //Actualizando cotenido
    for ($i=0; $i<$contador_contenido ; $i++) {
      $revista->contents[$i]->title=$request["titleContent".$i];
    }


    //Borramos las relaciones entre contenidos y colaboradores
    foreach ($contents as $content) {
      if ($content->magazine_id == $id) {
        $content->authors()->detach();
      }
    }
    //Relacionamos nuevamente los colaboradores de los contenidos
    foreach ($magazines as $magazine) {
      if ($magazine->id == $id) {
          //Recorre los contenidos de cada revista
          $cont = 0 ;
          foreach($magazine->contents as $content){
            //Si el contenido esta relacionado con la revista
            if($content->magazine_id == $id){
              //recorremos el arreglo con los id de los colaboradores para asociarlos al contenido
                foreach ($request["collaborator".$cont] as $clave => $valor) {
                  $content -> authors() -> attach($valor);
                };
            };
            $cont = $cont +1 ;
          };
      };
    }
    //Borramos las relaciones entre revistas y  editoriales
    foreach ($magazines as $magazine) {
      if ($magazine->id == $id) {
        $magazine->editorials()->detach();
      }
    }
    //Relacionamos nuevamente los editoriales de los contenidos
    foreach ($magazines as $magazine) {
      //Recorremos el arreglo con los id de las editoriales seleccionadas para asociarlas a las revistas
      foreach ($request['editorial'] as $clave => $valor2) {
        if($magazine->id == $id){
          $magazine-> editorials()->attach($valor2);
        }
      }
    };

    //Guardando las copias de revistas
    // dd($request->all(),$revista)  ;

    //Falta guardas los contenidos y los items usando save()

    $revista->save();
    return redirect('admin/magazines');
  }

  //Terminado
  public function destroy($id){
      $magazine = Magazine::find($id);
      $copias = MagazineCopy::all();
      $contents = Content::all();
      //Eliminando contenidos relacionados a la revista a destruir
      foreach ($contents as $content) {
        if($content->magazine_id == $id){
          $content->delete();
        }
      }
      //Eliminando copias relacionados a la revista a destruir
      foreach ($copias as $copia) {
          if($copia->magazine_id == $id){
            $copia->delete();
          }
        }
      //Las tablas pivotes se eliminaron usando ->onDelete('cascade')
      $magazine->delete();

      return redirect('admin/magazines');

   }
  public function content($id){

    $revistas = Magazine::all();
    return view('admin.md_magazines.content',['id'=>$id,
                                              'revistas'=>$revistas]);
  }

}
