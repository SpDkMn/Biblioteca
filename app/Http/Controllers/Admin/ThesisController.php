<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// Para usar el Modelo Tesis
use App\Author as Author;
use App\Thesis as Thesis;
use App\ThesisCopy as ThesisCopy;
use App\Editorial as Editorial;
use App\Content as Content;
use App\ChapterThesis as ChapterThesis;
use App\User as User;
// Para usar el Modelo Profile
use App\Profile as Profile;



class ThesisController extends Controller
{

  public function index(Request $request){

      $profile = User::with(['Employee','Employee.profile'])->where('id',Auth::user()->id)->first()->Employee->Profile;
      $j2a = json_decode($profile->JSON,true);
      // Iniciamos los permisos en false

      $ver = $crear = $editar = $eliminar =false;
    
      // Recorremos cada uno de los permisos de 'perfiles'
      foreach($j2a['empleados'] as $dato){
        foreach($dato as $key => $value){
          if($value == true){
            switch($key){
              case 'ver': $ver = true;break;
              case 'crear': $crear = true;break;
              case 'editar': $editar = true; break;
              case 'eliminar': $eliminar = true; break;
            }
          }
        }
      }
      $show = $new = $edit = $delete = "";



    $thesiss=Thesis::all();
    $editoriales = Editorial::all(); 
    $autores = Author::all();

    $copias_thesiss = ThesisCopy::all();
    $contenidos = Content::all();

    $show = view('admin.md_thesiss.show',['thesiss'=>$thesiss,
                                            'eliminar'=>$eliminar,
                                            'editar'=>$editar,
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
                                            'edit'=>$edit,
                                            'delete'=>$delete
                                            ]);
  }



 public function create(){
    
  }


 public function store(Request $request){

   {{$av=1;}}
    //Guardando los datos de la tesis
    $m = Thesis::create(['type'=>$request['tipo'],
                         'clasification'=>$request['clasification'],
                         'title'=>$request['title'],
                         'edition'=>$request['edition'],
                         'escuela'=>$request['escuela'],
                         'extension'=>$request['extension'],
                         'dimensions'=>$request['dimension'],
                         'physicalDetails'=>$request['detalles'],
                         'accompaniment'=>$request['materialad'],
                         'conten'=>$request['contenido'],
                         'summary'=>$request['summary'],
                         'bibliografia'=>$request['bibliografia'],
                         'recomendacion'=>$request['recomendacion'],
                         'location'=>$request['ubicacion'],
                         'publicationLocation'=>$request['lugarsus'],
                         'asesor'=>$request['asesor'],
                         'recomendacion'=>$request['recomendacion'],  //Conclusiones y recomendaciones
                         ]);


   //Guardamos los registros de las tesis
    $thesiss = Thesis::all();
    //Guardamos los registros de las editoriales para el pivote
    $editoriales = Editorial::all();
   

    foreach ($thesiss as $thesis) {
      if($thesis->title == $request['title']){    //Si el titulo de la tesis encontrada en la base de datos es igua al titulo de la tesis que se esta ingresando al sistema, que el id de esa tesis de la base de datos se guarde en una variable
        $id_thesis = $thesis->id ; 
      };
    };     


//  GUARDANDO LOS DATOS DE LAS COPIAS DE TESIS

    for ($j=0; $j <= 8; $j++) {
            if($request['barcode'.$j]==null){
               continue;  
            }
            $mc = ThesisCopy::create([  'incomeNumber'=>$request['incomeNumber'.$j],
                                        'barcode'=>$request['barcode'.$j],
                                        'ejemplar'=>$request['copy'.$j], //Evitar que no haya ningun ejemplar que estee con datos vacios (colocar excepciones con el request). Y eliminar el contenedor que hace incrementar el numero de copia a medida que se duplica el contenedor de items (en la vista show)
                                        'availability'=>$av,
                                        'thesis_id'=>$id_thesis   //El id de la tesis que quiero relacionar ($id_thesis)
                                    ]);  
   }
   
//***RELACIONANDO LAS TABLAS PIVOTES***

  //Pivot-> Thesis - Editorial
       //Recorremos el arreglo con los id de las editoriales seleccionadas para asociarlas a las tesis
         $id=$request['editorial'];
         $thesis->editorials()->attach($id);
        

//Pivot-> Thesis - Autor
foreach ($thesiss as $thesi) {
      //Recorremos el arreglo con los id de los autores seleccionados para asociarlas a las tesis
      // Autor Principal
        

        foreach ($request['autorMain'] as $clave => $id) {
              if($thesi->id == $id_thesis){  //El id de la tesis ingresada con la que ya esta en la base de datos(Solo voy a relacionar mediante pivots). Aqui estan los selectores.
                    $thesi-> authors()->attach($id,['type'=>true]);
                }
          }
      // Autor secundario

    if($request['autorSecond']!=null){
      foreach ($request['autorSecond'] as $clave => $id) {
          if($thesi->id == $id_thesis){
                $thesi-> authors()->attach($id,['type'=>false]);
          }

       }
     }
  else  continue; 

};
        
    //Redireccionamos a la seccion de tesis
    return redirect('admin/thesis');
}



  public function edit($id){
    $editoriales = Editorial::all();
    $autores = Author::all();
    $thesiss = Thesis::all();
    $copias_thesiss = ThesisCopy::all();
    //Enviando arreglos -> Autores , editoriales , tesis , copias de tesis
     return view('admin.md_thesiss.edit',['id' => $id,
                                            'thesiss'=>$thesiss,
                                            'editoriales'=>$editoriales,
                                            'autores'=>$autores,
                                            'copias_thesiss'=>$copias_thesiss
                                            ]);
  }

 
  public function update(Request $request, $id){
        
        $thesis = Thesis::find($id);
        $copias = ThesisCopy::all();
        $thesiss = Thesis::all();
        $editoriales = Editorial::all();
         $contador_copia = 0;
         $contador_copia2 = 0;


   $copiasT=$thesis->thesisCopies;      

  //Contando las copias de la tesis
  foreach($copiasT as $copia){
     //Guarda la cantidad de items que hay luego de agregar
      $contador_copia2 ++ ;
    }

  while($request['barcode'.$contador_copia]!=null){
        $contador_copia ++ ;
  };

    $thesis->type = $request['tipo'];
    $thesis->clasification = $request['clasification'];
    $thesis->title = $request['title'];
    $thesis->edition = $request['edition'];
    $thesis->escuela = $request['escuela'];
    $thesis->extension = $request['extension'];
    $thesis->dimensions = $request['dimension'];
    $thesis->physicalDetails = $request['detalles'];
    $thesis->accompaniment = $request['materialad'];
    $thesis->conten = $request['contenido'];
    $thesis->summary = $request['summary'];
    $thesis->bibliografia = $request['bibliografia'];
    $thesis->recomendacion = $request['recomendacion'];
    $thesis->location = $request['ubicacion'];
    $thesis->publicationLocation = $request['lugarsus'];
    $thesis->asesor = $request['asesor'];

      /*if(is_string($request['author'])){
          //Convirtiendo a entero el valor de $request['author'], pues es una cadena y al asignarlo guardara 0
          $request['author'] = (int)$request['author'];
      }*/
    //  $thesis->authors->author_id = $request['author'];


/*    for($i=0;$i<=8;$i++){
          $thesis->thesisCopies[$i]->delete();
      }
*/


      foreach($copias as $copia) {
        if($copia->thesis_id == $id) {
          $copia->delete();
        }
      }

    {{$av=1;}}

//  GUARDANDO LOS DATOS DE LAS COPIAS DE TESIS

    for ($j=0; $j <= 8; $j++) {      
            if($request['barcode'.$j]==null){
               continue;  
            }
            $mc = ThesisCopy::create([  'incomeNumber'=>$request['incomeNumber'.$j],
                                        'barcode'=>$request['barcode'.$j],
                                        'ejemplar'=>$request['copy'.$j], //Evitar que no haya ningun ejemplar que estee con datos vacios (colocar excepciones con el request). Y eliminar el contenedor que hace incrementar el numero de copia a medida que se duplica el contenedor de items (en la vista show)
                                        'availability'=>$av,
                                        'thesis_id'=>$id   //El id de la tesis que quiero relacionar ($id_thesis)
                                    ]);  
   }    



//Borramos la relacion entre tesis y editorial, tesis y asesor   
foreach ($thesiss as $thesi) {
      if ($thesi->id == $id) {
        $thesi->authors()->detach();
      }
    }

//Pivot-> Thesis - Autor
foreach ($thesiss as $thesi) {
      //Recorremos el arreglo con los id de los autores seleccionados para asociarlas a las tesis
      // Autor Principal  
        foreach ($request['autorMain'] as $clave => $id) {
              if($thesi->id == $thesis->id){  //El id de la tesis ingresada con la que ya esta en la base de datos(Solo voy a relacionar mediante pivots). Aqui estan los selectores.
                    $thesi-> authors()->attach($id,['type'=>true]);
                }
          }
      // Autor secundario
    if($request['autorSecond']!=null){
      foreach ($request['autorSecond'] as $clave => $id) {
          if($thesi->id == $thesis->id){
                $thesi-> authors()->attach($id,['type'=>false]);
          }
       }
     }
  else  continue; 
};

     $thesis->editorials()->detach(); 
    
     $id=$request['editorial'];
     $thesis->editorials()->attach($id);
        
    $thesis->save();
    return redirect('admin/thesis');
}


  public function destroy($id)
  {   
    $thesis = Thesis::find($id);
      $copias = ThesisCopy::all();

      foreach($copias as $copia) {
        if($copia->thesis_id == $id) {
          $copia->delete();
        }
      }
      $thesis->authors()->detach();
      $thesis->editorials()->detach();
  // $thesis->categories()->detach();
      $thesis->delete();
 
       return redirect()->route('thesis.index');
   }


  public function content(Request $request,$id){
        $thesis=Thesis::find($id);
        
        return view('admin.md_thesiss.show2')->with('thesis',$thesis);
      }


  public function show($id){
      $thesis = Thesis::find($id);
      $copias = ThesisCopy::all();

      foreach($copias as $copia) {
        if($copia->thesis_id == $id) {
          $copia->delete();
        }
      }
      $thesis->authors()->detach();
      $thesis->editorials()->detach();
  // $thesis->categories()->detach();
      $thesis->delete();
 
       return redirect()->route('thesis.index');
      }

}