<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    $item = view('admin.md_magazines.items',['id'=>null,
                                              'revistas'=>$revistas]);
    //Enviando arreglos -> Autores , editoriales , revistas , copias_revistas
 		$new = view('admin.md_magazines.new',['autores'=>$autores,
                                          'editoriales'=>$editoriales
                                          ]);
    $show = view('admin.md_magazines.show',['revistas'=>$revistas,
                                            'copias_revistas'=>$copias_revistas,
                                            'contenidos'=>$contenidos,
                                            'editoriales'=>$editoriales,
                                            'autores'=>$autores,
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
                                            'content'=>$content,
                                            'item'=>$item
                                          ]);
 	}
  //Funcion no usada
 	public function create(){
    //Funcion no usada
 	}
  //Terminado
 	public function store(Request $request){
    // dd($request->all());
    function cambiaCadena($str){
      return intval(preg_replace('/[^0-9]+/', '', $str), 10) ;
    }

 		//Almacenamos lo que el usuario ingresa
    //Declarando contadores
    $contador_contenido = 0 ;
    $contador_copia = 0 ;
    //Contando los contenidos de la revista
    while($request['titleContent'.$contador_contenido]!=null){
      $contador_contenido ++ ;
    };
    //Contando las copias de la revista
    while($request['incomeNumber'.$contador_copia]!=null){
      $contador_copia ++ ;
    };

    //Guardando los datos de la revista
 		$m = Magazine::create(['title'=>$request['title'],
                                'subtitle'=>$request['subtitle'],
 		                            'issn'=>cambiaCadena($request['issn']),
                                'issnD'=>cambiaCadena($request['issnD']),
                                'author_id'=>$request['author'],
                                'clasification'=>$request['clasification']
                                ]);
   //Guardamos los registros de las revistas
    $magazines = Magazine::all();
    //Guardamos los registros de las editoriales para el pivote
    $editoriales = Editorial::all();
    // Capturando id de la revista ingresada
    foreach ($magazines as $magazine) {

      if($magazine->issn == cambiaCadena($request['issn'])){
        $id_magazine = $magazine->id ;
      };

    };
    //Guardando datos de las copias de revistas
    for ($j=0; $j < $contador_copia; $j++) {
      $mc = MagazineCopy::create(['incomeNumber'=>$request['incomeNumber'.$j],
                                  'barcode'=>cambiaCadena($request['barcode'.$j]),
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
              //Si el arreglo colaborador no esta vacio
              if($request["collaborator".$cont]!=null){
                foreach ($request["collaborator".$cont] as $clave => $id) {
                    $content -> authors() -> attach($id);
                };
              }
            };
            $cont = $cont +1 ;
          };
      };
    }
    //Pivot-> Magazine - Editorial
    foreach ($magazines as $magazine) {
      //Recorremos el arreglo con los id de las editoriales seleccionadas para asociarlas a las revistas
      // Editoriales anexadas
      if($request['mEditorialSecond']!=null){
        foreach ($request['mEditorialSecond'] as $clave => $id) {
          if($magazine->id == $id_magazine){
                $magazine-> editorials() -> attach($id,['type'=>false]);
            }
          }
      }

        // Editorial Primaria
        foreach ($request['mEditorialMain'] as $clave => $id) {
          if($magazine->id == $id_magazine){
                $magazine-> editorials() -> attach($id,['type'=>true]);
            }
          }
    };
 		//Redireccionamos a la seccion de revistas
 		return redirect('admin/magazines');
 	}
  //Terminado
  public function edit($id){
    $revistas = Magazine::all();
    $autores = Author::all();
    $editorial = Editorial::find($id);
    $editoriales = Editorial::all();
    return view('admin.md_magazines.edit',['id'=>$id,
                                          'revistas'=>$revistas,
                                          //Para la carga de opciones de editoriales y colaboradores
                                          'editoriales'=>$editoriales,
                                          'editorial'=>$editorial,
                                          'autores'=>$autores]);
  }
  //Terminado - Falta optimizar
  public function update(Request $request, $id){
    //Obteniendo datos
    $revistaP = Magazine::find($id);
    $revista = Magazine::find($id);
    $copias = MagazineCopy::all();
    $magazines = Magazine::all();
    $contents = Content::all();
    $editoriales = Editorial::all();
    //Inicializando contadores
      $contador_contenido = 0 ;
      $contador_contenido2 = 0 ;
      $contador_copia = 0;
      $contador_copia2 = 0;
    //Asignando
      //Copias de la revista a editar
      $copiasR=$revista->magazines_copies;
      //CONTENIDO DE REVISTA
        //Contenidos de la revista a editar
        $contentsR = $revista->contents;
        //Contando las contenidos de la revista antes de editar ($contador_contenido2)
        foreach($contentsR as $contentR){
          $contador_contenido2 ++ ;
        }
        //Contando los contenidos luego de editar ($contador_contenido)
        while($request['titleContent'.$contador_contenido]!=null){
          $contador_contenido ++ ;
        };
      //COPIAS DE REVISTA
        //Contando las copias de la revista antes de editar ($contador_copia2)
        foreach($copiasR as $copia){
          $contador_copia2 ++ ;
        }
        //Contando las copias de revista luego de editar ($contador_copia)
        while($request['incomeNumber'.$contador_copia]!=null){
          //Muestra la cantidad de item que hay luego de editar
          $contador_copia ++ ;
        };

    //********************************************************************************************************
    /* PRUEBAS */
    // dd($request->all(),$request['clasification1'],$revista->magazines_copies,'Copias luego de editar:',$contador_copia ,'Copias antes de Editar:',$contador_copia2);
    //********************************************************************************************************

    //Actualizando datos de revista
      $revista->title = $request['title'];
      $revista->subtitle = $request['subtitle'];
      $revista->issn = $request['issn'];
      $revista->issnD = $request['issnD'];
      $revista->clasification = $request['clasification'];
      if(is_string($request['author'])){
        //Convirtiendo a entero el valor de $request['author'], pues es una cadena y al asignarlo guardara 0
        $request['author'] = (int)$request['author'];
      }
      $revista->author_id = $request['author'];
    //Actualizacion de datos de los items
      for ($j=0; $j < $contador_copia2 ; $j++) {
        //Agregando las nuevos datos del item
        $incomeN = $request['incomeNumber'.$j];
        $barC = $request['barcode'.$j];
        $cop = $request['copy'.$j];
        if(($incomeN!= null) && ($barC!=null) && ($cop!=null)){
          $revista->magazines_copies[$j]->incomeNumber = $incomeN;
          $revista->magazines_copies[$j]->barcode = $barC;
          $revista->magazines_copies[$j]->copy =$cop;
          $copiasR[$j]->save();
        }else{ //Si son nulos es porque han sido eliminados luego de que fueron agregados
          //Probando...
          $copiaEliminada = $revista->magazines_copies[$j] ;
          $copiaEliminada->delete();
        }
      };
    //Agregando los nuevos items que se han colocado en editar
      for ($j=$contador_copia2; $j < $contador_copia; $j++) {
        $mc = MagazineCopy::create(['incomeNumber'=>$request['incomeNumber'.$j],
                                    'barcode'=>$request['barcode'.$j],
                                    'copy'=>$request['copy'.$j],
                                    'magazine_id'=>$id
                                    ]);
      }
    //Agregando Los nuevos Contenidos que se han agregado en editar
      for ($i=$contador_contenido2; $i<$contador_contenido ; $i++) {
        $cc = Content::create(['title'=>$request["titleContent".$i],
                             'magazine_id'=>$id
                                               ]);
      }
    //Actualizando contenido
      for ($i=0; $i<$contador_contenido2 ; $i++) {
        $revista->contents[$i]->title=$request["titleContent".$i];
        $contentsR[$i]->save();

      }
    //Borramos las relaciones entre contenidos y colaboradores
      foreach($revistaP->contents as $contentR) {
          $contentR->authors()->detach();
      }
    //Inicializando contador
      $cont = 0 ;
    //Añadiendo nuevas relaciones entre contenidos y colaboradores
      foreach ($revistaP->contents as $contentR) {
          if($request["collaborator".$cont]!=null){
            foreach ($request["collaborator".$cont] as $clave => $id) {
              $contentR -> authors() -> attach($id);
            };
            $cont ++ ;
          }
        }
    //Borramos las relaciones entre revistas y  editoriales
    foreach ($magazines as $magazine) {
      if ($magazine->id == $id) {
        $magazine->editorials()->detach();
      }
    }
    //Relacionamos nuevamente revistas con editoriales
    foreach ($magazines as $magazine) {
      // Editoriales Anexadas
      if($request['mEditorialSecond']!=null){
        foreach ($request['mEditorialSecond'] as $clave => $valor) {
            if($magazine->id == $id){
              $magazine-> editorials()->attach($valor,['type'=>false]);
            }
        }
      }
      // Editorial Primaria -> Dato obligatorio
      foreach ($request['mEditorialMain'] as $clave => $valor2) {
        if($magazine->id == $id){
              $magazine-> editorials() -> attach($valor2,['type'=>true]);
          }
        }
    };
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
  //Terminado
  public function content($id){
    $revistas = Magazine::all();
    return view('admin.md_magazines.content',['id'=>$id,
                                              'revistas'=>$revistas]);
  }
  //Terminado
  public function itemDetail($id){
    $revistas = Magazine::all();
    return view('admin.md_magazines.items',['revistas'=>$revistas,
                                          'id'=>$id]);
  }
}
