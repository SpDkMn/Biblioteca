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
      


 	}


 	public function store(Request $request){
    
    dd("hola prro");

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
                      'accompaniment'=>$request['accompaniment']
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
        if($request['edition'][$i]==null)
            $edition[$i]=0;
        else
            $edition[$i] =$request['edition'][$i];
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
        if($request['location'][$i]==null)
            $location[$i]="";
        else
            $location[$i] =$request['location'][$i];
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
        if($request['phone'][$i]==null)
            $phone[$i]="";
        else
            $phone[$i] =$request['phone'][$i];
        }

    for($i=0;$i<$contador_copia;$i++){
        if($request['ruc'][$i]==null)
            $ruc[$i]="";
        else
            $ruc[$i] =$request['ruc'][$i];
    }
    

    for($i=0;$i<$contador_copia;$i++){
      
      $bandera=false;

      if($request['availability'][$i] == "Disponible")
        $bandera=true;

      $bc = BookCopy::create([
        'incomeNumber' => $incomeNumber[$i],
        'clasification'=>$clasification,
        'barcode'=>$barcode[$i],
        'copy'=>$i+1,
        'edition'=>$edition[$i],
        'acquisitionModality'=>$acquisitionModality[$i],
        'acquisitionSource'=>$acquisitionSource[$i],
        'acquisitionPrice'=>$acquisitionPrice[$i],
        'acquisitionDate'=>$acquisitionDate[$i],
        'location'=>$location[$i],
        'management'=>$management[$i],
        'availability'=>$bandera,
        'printType'=>$printType[$i],
        'publicationLocation'=>$publicationLocation[$i],
        'publicationDate'=>$publicationDate[$i],
        'phone'=>$phone[$i],
        'ruc'=>$ruc[$i],
        'book_id'=>$book_id
      ]);

    }

    return redirect('admin/book');

  }

  public function edit($id){
    
    $book = Book::find($id);

    $editoriales = Editorial::all();
    $autores = Author::all();
    $chapters = ChapterBook::all();
    $bookCopies = BookCopy::all();
    
    

    return view('admin.md_books.edit',[     'book'=>$book,
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
    if($request['extension']==null)
        $request['extension']="";
    if($request['physicalDetails']==null)
        $request['physicalDetails']="";
    if($request['dimensions']==null)
        $request['dimensions']="";
    if($request['accompaniment']==null)
        $request['accompaniment']="Ninguno";

    $book->clasification = $request['clasification'];
    $book->title = $request['title'];
    $book->secondaryTitle = $request['secondaryTitle'];
    $book->summary = $request['summary'];
    $book->isbn = $request['isbn'];
    $book->extension = $request['extension'];
    $book->physicalDetails = $request['physicalDetails'];
    $book->dimensions = $request['dimensions'];
    $book->accompaniment = $request['accompaniment'];

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
    

    $book->chapters()->delete();

    //Crenado los capitulos , utilizo el id de libro
    $contador_capitulos=0;
    foreach ($request['chapter'] as $chapter) {
          $contador_capitulos++;
          $cb = ChapterBook::create([
            'name'=>$chapter,
            'number'=>$contador_capitulos,
            'book_id'=>$book->id
          ]);
    }

    $book->save();

    $book->bookCopies()->delete();

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
        if($request['edition'][$i]==null)
            $edition[$i]=0;
        else
            $edition[$i] =$request['edition'][$i];
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
        if($request['location'][$i]==null)
            $location[$i]="";
        else
            $location[$i] =$request['location'][$i];
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
        if($request['phone'][$i]==null)
            $phone[$i]="";
        else
            $phone[$i] =$request['phone'][$i];
        }

    for($i=0;$i<$contador_copia;$i++){
        if($request['ruc'][$i]==null)
            $ruc[$i]="";
        else
            $ruc[$i] =$request['ruc'][$i];
    }
    

    for($i=0;$i<$contador_copia;$i++){
      
      $bandera=false;

      if($request['availability'][$i] == "Disponible")
        $bandera=true;

      $bc = BookCopy::create([
        'incomeNumber' => $incomeNumber[$i],
        'clasification'=>$clasification,
        'barcode'=>$barcode[$i],
        'copy'=>$i+1,
        'edition'=>$edition[$i],
        'acquisitionModality'=>$acquisitionModality[$i],
        'acquisitionSource'=>$acquisitionSource[$i],
        'acquisitionPrice'=>$acquisitionPrice[$i],
        'acquisitionDate'=>$acquisitionDate[$i],
        'location'=>$location[$i],
        'management'=>$management[$i],
        'availability'=>$bandera,
        'printType'=>$printType[$i],
        'publicationLocation'=>$publicationLocation[$i],
        'publicationDate'=>$publicationDate[$i],
        'phone'=>$phone[$i],
        'ruc'=>$ruc[$i],
        'book_id'=>$book->id
      ]);

    }

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


   public function show(Request $request,$id){

      $book=Book::find($id);
      if($request->get('page')==1){
        return view('admin.md_books.show2')->with('book',$book);
      }
      if($request->get('page')==2){
        return view('admin.md_books.show3')->with('book',$book);
      }
      
      if($request->get('page')==3){
         $books=Book::all();
         return view('admin.md_books.show')->with('books',$books);
      }
      
    }

  public function content(){
    
  }

}