<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Para usar el Modelo Tesis
use App\Author as Author;
use App\Thesis as Thesis;
use App\ThesisCopy as ThesisCopy;
use App\Editorial as Editorial;
use App\Content as Content;

class ThesisController extends Controller
{

 	public function index(){

    $thesiss=Thesis::all();
    $editoriales = Editorial::all(); 
    $autores = Author::all();

    $copias_thesiss = ThesisCopy::all();
    $contenidos = Content::all();

    $show = view('admin.md_thesiss.show',['thesiss'=>$thesiss
                                            ]);
    
    $new=view('admin.md_thesiss.new',['thesiss'=>$thesiss,
                                    'editoriales'=>$editoriales,
                                    'autores'=>$autores
      ]);

    $edit = view('admin.md_thesiss.edit',[  'thesiss'=>$thesiss,
                                              'copias_thesiss'=>$copias_thesiss,
                                              'contenidos'=>$contenidos,
                                              'editoriales'=>$editoriales,
                                              'autores'=>$autores,
                                              //Definiendo las variables para editar
                                              'id'=>null,
                                              'autores'=>null
                                              ]);


     return view('admin.md_thesiss.index',[
                                            'new' => $new,
                                            'show'=>$show,
                                            'edit'=>$edit
                                            
                                            ]);
 	}



 public function create(){
    
 	}


 	public function store(Request $request){

    $contador_contenido = 0 ;
    $contador_copia = 0 ;

    //gracias while por existir :)
    //Contando los contenidos de la tesis
    while($request['titleContent'.$contador_contenido]!=null){
      $contador_contenido ++ ;
    };
    //Contando las copias de la tesis
    while($request['clasification'.$contador_copia]!=null){
      $contador_copia ++ ;
    };




    //Guardando los datos de la tesis
 		$m = Thesis::create(['title'=>$request['title'],
 		                            'issn'=>$request['issn'],
                                'author_id'=>$request['author']
                                ]);

   //Guardamos los registros de las tesis
    $thesiss = Thesis::all();
    //Guardamos los registros de las editoriales para el pivote
    $editoriales = Editorial::all();
    // Capturando id de la tesis ingresada
    foreach ($thesiss as $thesis) {
      if($thesis->issn == $request['issn']){
        $id_thesis = $thesis->id ;
      };
    };
    //Guardando datos de las copias de tesis
    for ($j=0; $j < $contador_copia; $j++) {
      $mc = ThesisCopy::create(['clasification'=>$request['clasification'.$j],
                                  'incomeNumber'=>$request['incomeNumber'.$j],
                                  'barcode'=>$request['barcode'.$j],
                                  'copy'=>$request['copy'.$j],
                                  'thesis_id'=>$id_thesis
                                  ]);
    }
    //Guardando los titulos de los contenidos de una tesis
    //Este bucle tiene que ir antes del bucle que asocia los contenidos y los autores
     for ($i=0; $i<$contador_contenido ; $i++) {
       $c = Content::create(['title'=>$request["titleContent".$i],
                            'thesis_id'=>$id_thesis
                                              ]);
     }
    //RELACIONANDO LAS TABLAS PIVOTES
    //Pivot -> Content - author
    foreach ($thesiss as $thesis) {
      if ($thesis->id == $id_thesis) {
          //Recorre los contenidos de cada tesis
          $cont = 0 ;
          foreach($thesis->contents as $content){
            //Si el contenido esta relacionado con la tesis
            if($content->thesis_id == $id_thesis){
              //recorremos el arreglo con los id de los colaboradores para asociarlos al contenido
                foreach ($request["collaborator".$cont] as $clave => $id) {
                  $content -> authors() -> attach($id);
                };
            };
            $cont = $cont +1 ;
          };
      };
    }
    //Pivot-> Thesis - Editorial
    foreach ($thesiss as $thesis) {
      //Recorremos el arreglo con los id de las editoriales seleccionadas para asociarlas a las tesis
      foreach ($request['editorial'] as $clave => $id) {
        if($thesis->id == $id_thesis){
          $thesis-> editorials() -> attach($id);
        }
      }
    };
 		//Redireccionamos a la seccion de tesis
 		return redirect('admin/thesis');
 	}




  public function edit($id){
    $editoriales = Editorial::all();
    $autores = Author::all();
    $tesis = Thesis::all();
    $copias_tesis = ThesisCopy::all();
    $contenidos = Content::all();

    //Enviando arreglos -> Autores , editoriales , tesis , copias_tesis
    $new = view('admin.md_thesiss.new',['autores'=>$autores,
                                          'editoriales'=>$editoriales
                                          ]);

    $show = view('admin.md_thesiss.show',['thesis'=>$tesis,
                                            'copias_tesis'=>$copias_tesis,
                                            'contenidos'=>$contenidos,
                                            'editoriales'=>$editoriales,
                                            'autores'=>$autores
                                            ]);
    
    $edit = view('admin.md_thesis.edit',[ 'thesis'=>Thesis::find($id),
                                              'copias_thesis'=>$copias_thesis,
                                              'contenidos'=>$contenidos,
                                              'editoriales'=>$editoriales,
                                              'autores'=>$autores
                                              ]);

     return view('admin.md_thesis.index',['new' => $new,
                                            'show'=>$show,
                                            'edit'=>$edit]);
     // return view('admin.md_thesis.edit')->with('id_m',$id);
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
      $thesis = Thesis::find($id);
      $thesis->categories()->detach();
      $thesis->delete();
 
       return redirect()->route('thesis.index');
   }


   public function show(Request $request,$id){
      $thesis=Thesis::find($id);
      if($request->get('page')==1){
        return view('admin.md_thesiss.show2')->with('thesis',$thesis);
      }
      if($request->get('page')==2){
        dd("estas en la pagina 2");
      }
      if($request->get('page')==3){
        dd("estas en la pagina 3");
      }
    }

  public function content(){
    
  }

}