<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Para usar el Modelo Magazine
use App\Author as Author;
use App\Thesis as Thesis;
use App\ThesisCopy as ThesisCopy;
use App\Editorial as Editorial;


class ThesisController extends Controller
{

 	public function index(){

    $thesis = Thesis::find(1);
    echo $thesis->title."</br>";

    echo $thesis->isbn."</br>";

    echo $thesis->editorial_id."</br>";

    foreach ($thesis->authors as $author) {

      echo "Nombre autor: ".$author->name."</br>";
      echo "categoria: ".$author->pivot->category_id."</br>";
    }

    $copy_thesiss=ThesisCopy::all();

    foreach ($copy_thesiss as $copy_thesis) {
      if($copy_thesis->thesis_id==1){
        echo "Numero de ingreso: ".$copy_thesis->incomeNumber."</br>";
        echo "Codigo de barras: ".$copy_thesis->barcode."</br>";
        echo "Ejemplar: ".$copy_thesis->copy."</br>";
        echo "Clasificacion: ".$copy_thesis->clasification."</br>";
      }
    }

    dd("</br>Alto ahi rufian :V");

/**
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
    $edit = view('admin.md_magazines.edit',[  'revistas'=>Magazine::first(),
                                              'copias_revistas'=>$copias_revistas,
                                              'contenidos'=>$contenidos,
                                              'editoriales'=>$editoriales,
                                              'autores'=>$autores
                                              ]);

     return view('admin.md_magazines.index',['new' => $new,
                                            'show'=>$show,
                                            'edit'=>$edit]);
 	}
**/}
}