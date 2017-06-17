<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Para usar el Modelo Magazine
use App\Author as Author;
use App\Book as Book;
use App\BookCopy as BookCopy;
use App\Editorial as Editorial;
use App\Content as Content;
use App\ChapterBook as ChapterBook;

class BookController extends Controller
{

 	public function index(){

    $books=Book::all();
    $editoriales = Editorial::all(); 
    $autores = Author::all();
 
    $show = view('admin.md_books.show',['books'=>$books
                                            ]);
    
    $new=view('admin.md_books.new',['books'=>$books,
                                    'editoriales'=>$editoriales,
                                    'autores'=>$autores
      ]);


     return view('admin.md_books.index',[
                                            'show'=>$show,
                                            'new'=>$new
                                            ]);
 	}



 public function create(){
    $books=Book::all();
    $editoriales = Editorial::all(); 
    $autores = Author::all();

    return view('admin.md_books.new',['books'=>$books,
                                    'editoriales'=>$editoriales,
                                    'autores'=>$autores
      ]);

 }


 	public function store(Request $request){
    
  
    $books=Book::all();
    
    //Como no se pueden guardar null , entonces verifiricare , y lo llenare con ""
    if($request['title']==null)
        $request['title']="";
    if($request['secondaryTitle']==null)
        $request['secondaryTitle']="";
    if($request['summary']==null)
        $request['summary']="";
    if($request['isbn']==null)
        $request['isbn']="";
    if($request['extension']==null)
        $request['extension']="";
    if($request['physicalDetails']==null)
        $request['physicalDetails']="";
    if($request['dimensions']==null)
        $request['dimensions']="";
    if($request['accompaniment']==null)
        $request['accompaniment']="Ninguno";
    if($request['edition']==null)
        $request['edition']="";
    if($request['libraryLocation']==null)
        $request['libraryLocation']="";
    //Creando un nuevo libro , lo asigno a la variable $b
    $b = Book::create([
                      'clasification'=>$request['clasification'],
                      'title'=>$request['title'],
                      'secondaryTitle'=>$request['secondaryTitle'],
                      'summary'=>$request['summary'],
                      'isbn'=>$request['isbn'],
                      'extension'=>$request['extension'],
                      'physicalDetails'=>$request['physicalDetails'],
                      'dimensions'=>$request['dimensions'],
                      'accompaniment'=>$request['accompaniment'],
                      'relationBook'=>1,
                      'edition'=>$request['edition'],
                      'libraryLocation'=>$request['libraryLocation']
                      ]);

    //Como el libro ya se creo , buscare y guardare su id    

    $book_id = $b->id;

    $autores = Author::all();
    $editoriales = Editorial::all();

    
    //Creando relacion de autor principal con libro
    if($request['primaryAuthor']!=null){
        foreach( $request['primaryAuthor'] as $autor ){
          foreach ($autores as $aut ) {

              if($autor == $aut->id)
                {
                  $b->authors()->attach($aut->id,['type'=>true]);
                  break;
                }
          }
        }
    }
    
    //Creando relacion de autor secundario con libro
    if($request['secondaryAuthor']!=null){
        foreach($request['secondaryAuthor'] as $autor){
          foreach ($autores as $aut) {
              if($autor == $aut->id)
                {$b->authors()->attach($aut->id,['type'=>false]);
                  break;
                }
          }
        }
    }

    //Creando Relacion de la editorial con libro
    if($request['editorial']!=null){
      foreach($request['editorial'] as $editorial){
        foreach ($editoriales as $edi) {
            if($editorial == $edi->id)
              {$b->editorials()->attach($edi->id,['type'=>true]);
                break;
              }
        }
      }
    }
    
    //Creando relacion de anexo con libro
    if($request['secondaryEditorial']!=null){
      foreach($request['secondaryEditorial'] as $editorial){
        foreach ($editoriales as $edi) {
            if($editorial == $edi->id)
              {$b->editorials()->attach($edi->id,['type'=>false]);
                break;
              }
        }
      }
    }
    

    //Crenado los capitulos , utilizo el id de libro
    $contador_capitulos=0;
    foreach ($request['chapter'] as $chapter) {
          $contador_capitulos++;
          $cb = ChapterBook::create([
            'name'=>$chapter,
            'number'=>$contador_capitulos,
            'book_id'=>$book_id
          ]);
    }

    //Calculando el numero de ejemplares del libro
    $contador_copia=0;
    foreach ($request['incomeNumber'] as $a) {
      $contador_copia ++;
    }

    //Asigno lo ingresado en el formulario a las siguientes variables 
    $incomeNumber =$request['incomeNumber'];
    $clasification =$request['clasification'];
    $acquisitionModality =$request['acquisitionModality'];
    $printType =$request['printType'];
  
    for($i=0;$i<$contador_copia;$i++){
        if($request['barcode'][$i]==null)
            $barcode[$i]= 0;
        else
            $barcode[$i]=$request['barcode'][$i];
    }

    for($i=0;$i<$contador_copia;$i++){
        if($request['volume'][$i]==null)
            $volume[$i]=0;
        else
            $volume[$i] =$request['volume'][$i];
    }
    
    for($i=0;$i<$contador_copia;$i++){
        if($request['acquisitionSource'][$i]==null)
            $acquisitionSource[$i]="";
        else
            $acquisitionSource[$i] =$request['acquisitionSource'][$i];
    }
    
    for($i=0;$i<$contador_copia;$i++){
        if($request['acquisitionPrice'][$i]==null)
            $acquisitionPrice[$i]="";
        else
            $acquisitionPrice[$i] =$request['acquisitionPrice'][$i];
    }
      
    for($i=0;$i<$contador_copia;$i++){
        if($request['acquisitionDate'][$i]==null)
            $acquisitionDate[$i]="";
        else
            $acquisitionDate[$i] =$request['acquisitionDate'][$i];
    }
    
    for($i=0;$i<$contador_copia;$i++){
        if($request['management'][$i]==null)
            $management[$i]=0;
        else
            $management[$i] =$request['management'][$i];
    }
    
    for($i=0;$i<$contador_copia;$i++){
        if($request['publicationLocation'][$i]==null)
            $publicationLocation[$i]="";
        else
            $publicationLocation[$i] =$request['publicationLocation'][$i];
    }
    
    for($i=0;$i<$contador_copia;$i++){
        if($request['publicationDate'][$i]==null)
            $publicationDate[$i]="";
        else
            $publicationDate[$i] =$request['publicationDate'][$i];
    }
    
  

    for($i=0;$i<$contador_copia;$i++){
      
      $bandera=false;

      if($request['availability'][$i] == "Disponible")
        $bandera=true;

      $copy_aux=$i+1;$bc_clasification = $request->clasification."ej.".$copy_aux;

      $bc = BookCopy::create([
        'incomeNumber' => $incomeNumber[$i],
        'clasification'=>$copy_aux,
        'barcode'=>$barcode[$i],
        'copy'=>$i+1,
        'volume'=>$volume[$i],
        'acquisitionModality'=>$acquisitionModality[$i],
        'acquisitionSource'=>$acquisitionSource[$i],
        'acquisitionPrice'=>$acquisitionPrice[$i],
        'acquisitionDate'=>$acquisitionDate[$i],
        
        'management'=>$management[$i],
        'availability'=>$bandera,
        'printType'=>$printType[$i],
        'publicationLocation'=>$publicationLocation[$i],
        'publicationDate'=>$publicationDate[$i],
        
        'book_id'=>$book_id
      ]);

    }

    return redirect('admin/book');

  }

  public function edit($id){
    $books = Book::all();
    $book = Book::find($id);

    $editoriales = Editorial::all();
    $autores = Author::all();
    $chapters = ChapterBook::all();
    $bookCopies = BookCopy::all();
    
    

    return view('admin.md_books.edit',[     'books'=>$books,
                                            'book'=>$book,
                                            'editoriales'=>$editoriales,
                                            'autores'=>$autores,
                                            'chapters'=>$chapters,
                                            'bookCopies'=>$bookCopies]);
     
  }




  public function update(Request $request, $id){
    $book= Book::find($id);
    $editoriales = Editorial::all();
    $autores = Author::all();
    $chapters = ChapterBook::all();
    $bookCopies = BookCopy::all();



    if($request['title']==null)
        $request['title']="";
    if($request['secondaryTitle']==null)
        $request['secondaryTitle']="";
    if($request['summary']==null)
        $request['summary']="";
    if($request['isbn']==null)
        $request['isbn']="";
    if($request['edition']==null)
      $request['edition']="";
    if($request['extension']==null)
        $request['extension']="";
    if($request['physicalDetails']==null)
        $request['physicalDetails']="";
    if($request['dimensions']==null)
        $request['dimensions']="";
    if($request['accompaniment']==null)
        $request['accompaniment']="Ninguno";
    if($request['libraryLocation']==null)
        $request['libraryLocation']="";

    $book->clasification = $request['clasification'];
    $book->title = $request['title'];
    $book->secondaryTitle = $request['secondaryTitle'];
    $book->summary = $request['summary'];
    $book->isbn = $request['isbn'];
    $book->extension = $request['extension'];
    $book->physicalDetails = $request['physicalDetails'];
    $book->dimensions = $request['dimensions'];
    $book->accompaniment = $request['accompaniment'];
    $book->relationBook = 1;
    $book->edition = $request->edition;
    $book->libraryLocation = $request->libraryLocation;

    $book->authors()->detach();
    $book->editorials()->detach(); 

    //Creando relacion de autor principal con libro
    if($request['primaryAuthor']!=null){
        foreach( $request['primaryAuthor'] as $autor ){
          foreach ($autores as $aut ) {

              if($autor == $aut->id)
                {
                  $book->authors()->attach($aut->id,['type'=>true]);
                  break;
                }
          }
        }
    }
    
    //Creando relacion de autor secundario con libro
    if($request['secondaryAuthor']!=null){
        foreach($request['secondaryAuthor'] as $autor){
          foreach ($autores as $aut) {
              if($autor == $aut->id)
                {$book->authors()->attach($aut->id,['type'=>false]);
                  break;
                }
          }
        }
    }

    //Creando Relacion de la editorial con libro
    if($request['editorial']!=null){
      foreach($request['editorial'] as $editorial){
        foreach ($editoriales as $edi) {
            if($editorial == $edi->id)
              {$book->editorials()->attach($edi->id,['type'=>true]);
                break;
              }
        }
      }
    }
    
    //Creando relacion de anexo con libro
    if($request['secondaryEditorial']!=null){
      foreach($request['secondaryEditorial'] as $editorial){
        foreach ($editoriales as $edi) {
            if($editorial == $edi->id)
              {$book->editorials()->attach($edi->id,['type'=>false]);
                break;
              }
        }
      }
    }
    
    //************EDITANDO CAPITULOS******************
    //Calculando la cantidad de capitulos antiguos
    $contador_capitulos_antiguo=0;
    foreach ($book->chapters as $chapter_aux) {
      $contador_capitulos_antiguo ++;
    }
    //Calculando la cantidad de capitulos nuevos
    $contador_capitulos_nuevo = 0;
    foreach ($request->chapter as $chapter_aux) {
      $contador_capitulos_nuevo ++;
    }
    //CASO I
    if($contador_capitulos_nuevo==$contador_capitulos_antiguo){
      for($i=0;$i<$contador_capitulos_nuevo;$i++){
        $book->chapters[$i]->name = $request->chapter[$i];
        $book->chapters[$i]->number = $i+1;
        $book->chapters[$i]->book_id = $id;
        $book->chapters[$i]->save();
      }
    }
    //CASO II
    if($contador_capitulos_nuevo<$contador_capitulos_antiguo){
      if($contador_capitulos_nuevo==$contador_capitulos_antiguo){
        for($i=0;$i<$contador_capitulos_nuevo;$i++){
          $book->chapters[$i]->name = $request->chapter[$i];
          $book->chapters[$i]->number = $i+1;
          $book->chapters[$i]->book_id = $id;
          $book->chapters[$i]->save();
        }
      }
      while($i<$contador_capitulos_antiguo){
        $book->chapters[$i]->delete();
        $i++;
      }
    }
    //CASO III
    if($contador_capitulos_nuevo>$contador_capitulos_antiguo){
      if($contador_capitulos_nuevo==$contador_capitulos_antiguo){
        for($i=0;$i<$contador_capitulos_nuevo;$i++){
          $book->chapters[$i]->name = $request->chapter[$i];
          $book->chapters[$i]->number = $i+1;
          $book->chapters[$i]->book_id = $id;
          $book->chapters[$i]->save();
        }
      }
      while($i<$contador_capitulos_nuevo){
        ChapterBook::create([
            'name'=>$request->chapter[$i],
            'number'=>$i+1,
            'book_id'=>$id
        ]);
        $i++;
      }
    }

    //**********************EDITANDO ITEMS**********************
    //Calculando el antiguo numero de ejemplares del libro
    $numero_copias_antiguo=0;
    foreach ($book->bookCopies as $copia_aux) {
      $numero_copias_antiguo++;
    }
    
    //Calculando el nuevo numero de ejemplares del libro
    $numero_copias_nuevo=0;
    foreach ($request['incomeNumber'] as $a) {
      $numero_copias_nuevo++;
    }

    //Analizo los tres casos 
    //CASO I
    //Como son vectores paralelos , ejem 
    //$book->bookCopies[0]->barcode : antiguo codigo de barras de item1 
    //$request->barcode[0]          : nuevo codigo de barras de item1
    if($numero_copias_antiguo==$numero_copias_nuevo){

      for($i=0;$i<$numero_copias_nuevo;$i++){
        $bandera=false;
        if($request->availability[$i] == "Disponible")
          $bandera=true;
        
        $copy_aux=$i+1;$bc_clasification = $request->clasification." ej. ".$copy_aux;

        $book->bookCopies[$i]->incomeNumber = $request->incomeNumber[$i];
        $book->bookCopies[$i]->clasification = $bc_clasification;
        $book->bookCopies[$i]->barcode = $request->barcode[$i];
        $book->bookCopies[$i]->copy = $i+1;
        $book->bookCopies[$i]->volume = $request->volume[$i];
        $book->bookCopies[$i]->acquisitionModality = $request->acquisitionModality[$i];
        $book->bookCopies[$i]->acquisitionSource = $request->acquisitionSource[$i];
        $book->bookCopies[$i]->acquisitionPrice = $request->acquisitionPrice[$i];
        $book->bookCopies[$i]->acquisitionDate = $request->acquisitionDate[$i];
        $book->bookCopies[$i]->management = $request->management[$i];
        $book->bookCopies[$i]->availability = $bandera;
        $book->bookCopies[$i]->printType = $request->printType[$i];
        $book->bookCopies[$i]->publicationLocation = $request->publicationLocation[$i];
        $book->bookCopies[$i]->publicationDate = $request->publicationDate[$i];
        $book->bookCopies[$i]->save();
      }
    }
    //CASO II
    if($numero_copias_nuevo<$numero_copias_antiguo){
      for($i=0;$i<$numero_copias_nuevo;$i++){
        $bandera=false;
        if($request->availability[$i] == "Disponible")
          $bandera=true;

        $copy_aux=$i+1;$bc_clasification = $request->clasification." ej. ".$copy_aux;

        $book->bookCopies[$i]->incomeNumber = $request->incomeNumber[$i];
        $book->bookCopies[$i]->clasification = $bc_clasification;
        $book->bookCopies[$i]->barcode = $request->barcode[$i];
        $book->bookCopies[$i]->copy = $i+1;
        $book->bookCopies[$i]->volume = $request->volume[$i];
        $book->bookCopies[$i]->acquisitionModality = $request->acquisitionModality[$i];
        $book->bookCopies[$i]->acquisitionSource = $request->acquisitionSource[$i];
        $book->bookCopies[$i]->acquisitionPrice = $request->acquisitionPrice[$i];
        $book->bookCopies[$i]->acquisitionDate = $request->acquisitionDate[$i];
        $book->bookCopies[$i]->management = $request->management[$i];
        $book->bookCopies[$i]->availability = $bandera;
        $book->bookCopies[$i]->printType = $request->printType[$i];
        $book->bookCopies[$i]->publicationLocation = $request->publicationLocation[$i];
        $book->bookCopies[$i]->publicationDate = $request->publicationDate[$i];
        $book->bookCopies[$i]->save();
      }
      while($i<$numero_copias_antiguo){
        $book->bookCopies[$i]->delete();
        $i++;
      }
    }
    //CASO III
    if($numero_copias_nuevo>$numero_copias_antiguo){
      for($i=0;$i<$numero_copias_antiguo;$i++){
        $bandera=false;
        if($request->availability[$i] == "Disponible")
          $bandera=true;

        $copy_aux=$i+1;$bc_clasification = $request->clasification." ej. ".$copy_aux;

        $book->bookCopies[$i]->incomeNumber = $request->incomeNumber[$i];
        $book->bookCopies[$i]->clasification = $bc_clasification;
        $book->bookCopies[$i]->barcode = $request->barcode[$i];
        $book->bookCopies[$i]->copy = $i+1;
        $book->bookCopies[$i]->volume = $request->volume[$i];
        $book->bookCopies[$i]->acquisitionModality = $request->acquisitionModality[$i];
        $book->bookCopies[$i]->acquisitionSource = $request->acquisitionSource[$i];
        $book->bookCopies[$i]->acquisitionPrice = $request->acquisitionPrice[$i];
        $book->bookCopies[$i]->acquisitionDate = $request->acquisitionDate[$i];
        $book->bookCopies[$i]->management = $request->management[$i];
        $book->bookCopies[$i]->availability = $bandera;
        $book->bookCopies[$i]->printType = $request->printType[$i];
        $book->bookCopies[$i]->publicationLocation = $request->publicationLocation[$i];
        $book->bookCopies[$i]->publicationDate = $request->publicationDate[$i];
        $book->bookCopies[$i]->save();
      }
      while ($i<$numero_copias_nuevo) {
        $bandera=false;
        if($request->availability[$i] == "Disponible")
          $bandera=true;

        $copy_aux=$i+1;$bc_clasification = $request->clasification." ej. ".$copy_aux;

         BookCopy::create([
          'incomeNumber' => $request->incomeNumber[$i],
          'clasification'=>$bc_clasification,
          'barcode'=>$request->barcode[$i],
          'copy'=>$i+1,
          'volume'=>$request->volume[$i],
          'acquisitionModality'=>$request->acquisitionModality[$i],
          'acquisitionSource'=>$request->acquisitionSource[$i],
          'acquisitionPrice'=>$request->acquisitionPrice[$i],
          'acquisitionDate'=>$request->acquisitionDate[$i],
          'management'=>$request->management[$i],
          'availability'=>$bandera,
          'printType'=>$request->printType[$i],
          'publicationLocation'=>$request->publicationLocation[$i],
          'publicationDate'=>$request->publicationDate[$i],
          'book_id'=>$id
        ]);
        $i++;
      }
    }
    //*********************FIN EDITAR ITEMS**********************
    
    return redirect()->route('book.index');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */


  public function destroy($id)
  {
      $book = Book::find($id);

      $book->authors()->detach();
      $book->editorials()->detach();

      $book->bookCopies()->delete();
      $book->chapters()->delete();

      $book->delete();
 
       return redirect()->route('book.index');
   }


   public function show(){

      $book=Book::find($id);
      if($request->get('page')==1){
        return view('admin.md_books.show2')->with('book',$book);
      }
      if($request->get('page')==2){
        return view('admin.md_books.show3')->with('book',$book);
      }
    }


  public function show2($id){
      
      $book= Book::find($id);
      $editoriales = Editorial::all();
      $autores = Author::all();
      $chapters = ChapterBook::all();
      $bookCopies = BookCopy::all();  
      return view('admin.md_books.show2',[ 'book'=>$book,
                                           'autores'=>$autores,
                                            'editoriales'=>$editoriales,
                                            'chapters'=>$chapters,
                                            'bookCopies'=>$bookCopies
                                            ]);
  }
  public function show3($id){
      $book= Book::find($id);
      $editoriales = Editorial::all();
      $autores = Author::all();
      $chapters = ChapterBook::all();
      $bookCopies = BookCopy::all();
      return view('admin.md_books.show3',[ 'book'=>$book
                                            ]);
  }

  public function content(){
    
  }

}