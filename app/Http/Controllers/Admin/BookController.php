<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Requests\BookRequest;
// Para usar el Modelo Magazine
use App\Author as Author;
use App\Book as Book;
use App\BookCopy as BookCopy;
use App\Editorial as Editorial;
use App\Content as Content;
use App\ChapterBook as ChapterBook;
use App\SearchItem as SearchItem;


define('BOOKS', 'books');
define('EDITORIALES', 'editoriales');
define('AUTORES', 'autores');
define('CLASIFICATION', 'clasification');
define('TITLE', 'title');
define('SECUNDARY_TITLE', 'secondaryTitle');
define('SUMMARY', 'summary');
define('EXTENSION', 'extension');
define('PHYSICAL_DETAILS', 'physicalDetails');
define('DIMENSIONS', 'dimensions');
define('ISBN', 'isbn');
define('ADMIN','admin');
define('MOD_BOOKS', ADMIN . '.md_books');
define('MBOOKS_EDIT', MOD_BOOKS . '.edit');
define('MBOOKS_NEW', MOD_BOOKS . '.new');
define('MBOOKS_SHOW', MOD_BOOKS . '.show');
define('MBOOKS_DELETE', MOD_BOOKS . '.delete');
define('MBOOKS_INDEX', MOD_BOOKS . '.index');

class BookController extends Controller
{

   public function index()
   {
      $books = Book::all();
      $editoriales = Editorial::all();
      $autores = Author::all();

      $show = view(MBOOKS_SHOW, [
         BOOKS => $books
      ]);

      $new = view(MBOOKS_NEW, [
         BOOKS => $books,
         EDITORIALES => $editoriales,
         AUTORES => $autores
      ]);
      return view(MBOOKS_INDEX, [
         'show' => $show,
         'new' => $new
      ]);
   }

   public function create()
   {
      $books = Book::all();
      $editoriales = Editorial::all();
      $autores = Author::all();
      return view(MBOOKS_NEW, [
         BOOKS => $books,
         EDITORIALES => $editoriales,
         AUTORES => $autores
      ]);
   }

   public function store(Request $request)
   {
     function cambiaCadena($str){return intval(preg_replace('/[^0-9]+/', '', $str), 10);}

     function buscarCapitulos($capitulos){
       $string_capitulo = "";
       foreach ($capitulos as $key => $value) {
        $string_capitulo = $string_capitulo.' '.$value;
       }
       return $string_capitulo;
     }
     function buscaAutores($id){
       $string_colaborador = "";
       if (is_string($id)) {
         $id = cambiaCadena($id);
       }
       $autor = Author::find($id);
       if ($autor!=null) {
         foreach ($autor as $key => $value) {
          $string_colaborador = $string_colaborador.' '.$value->name ;
         }
       }
       return $string_colaborador;
     }
     function buscaEditorial($id){
       $string_edit_second = "";
       if (is_string($id)) {
         $id = cambiaCadena($id);
       }
       $editorial = Editorial::find($id);
       if ($editorial!=null) {
         foreach ($editorial as $key => $value) {
          $string_edit_second = $string_edit_second.''.$value->name ;
         }
       }
       return $string_edit_second;
     }



      $b = Book::create([
         CLASIFICATION => $request[CLASIFICATION],
         TITLE => $request[TITLE],
         SECUNDARY_TITLE => $request[SECUNDARY_TITLE],
         SUMMARY => $request[SUMMARY],
         ISBN => $request[ISBN],
         EXTENSION => $request[EXTENSION],
         PHYSICAL_DETAILS => $request[PHYSICAL_DETAILS],
         DIMENSIONS => $request[DIMENSIONS],
         'accompaniment' => $request['accompaniment'],
         'relationBook' => 1,
         'edition' => $request['edition'],
         'libraryLocation' => $request['libraryLocation']
      ]);

      $book_id = $b->id;
      $autores = Author::all();
      $editoriales = Editorial::all();

      // Creando relacion de autor principal con libro
      if ($request['primaryAuthor'] != null) {
         foreach ($request['primaryAuthor'] as $autor) {
            foreach ($autores as $aut) {
               if ($autor == $aut->id) {
                  $b->authors()->attach($aut->id, [
                     'type' => true
                  ]);
                  break;
               }
            }
         }
      }

      // Creando relacion de autor secundario con libro
      if ($request['secondaryAuthor'] != null) {
         foreach ($request['secondaryAuthor'] as $autor) {
            foreach ($autores as $aut) {
               if ($autor == $aut->id) {
                  $b->authors()->attach($aut->id, [
                     'type' => false
                  ]);
                  break;
               }
            }
         }
      }
      // Creando Relacion de la editorial con libro
      if ($request['editorial'] != null) {
         foreach ($request['editorial'] as $editorial) {
            foreach ($editoriales as $edi) {
               if ($editorial == $edi->id) {
                  $b->editorials()->attach($edi->id, [
                     'type' => true
                  ]);
                  break;
               }
            }
         }
      }

      // Creando relacion de anexo con libro
      if ($request['secondaryEditorial'] != null) {
         foreach ($request['secondaryEditorial'] as $editorial) {
            foreach ($editoriales as $edi) {
               if ($editorial == $edi->id) {
                  $b->editorials()->attach($edi->id, [
                     'type' => false
                  ]);
                  break;
               }
            }
         }
      }

      // Crenado los capitulos , utilizo el id de libro
      $contador_capitulos = 0;
      foreach ($request['chapter'] as $chapter) {
         $contador_capitulos ++;
         ChapterBook::create([
            'name' => $chapter,
            'number' => $contador_capitulos,
            'book_id' => $book_id
         ]);
      }
      // Calculando el numero de ejemplares del libro
      $contador_copia = 0;
      foreach ($request['incomeNumber'] as $a) {
         $contador_copia ++;
      }

      for ($i = 0; $i < $contador_copia; $i ++) {

         $bandera = false;
         if ($request['availability'][$i] == "Disponible") {
            $bandera = true;
         }
         $copy_aux = $i + 1;
         $bc_clasification = $request->clasification . "ej." . $copy_aux;
         if ($request->volume[$i] != null) {
            $bc_clasification = $bc_clasification . " vol." . $request->volume[$i];
         }
         BookCopy::create([
            'incomeNumber' => $request->incomeNumber[$i],
            'clasification' => $request->clasification,
            'barcode' => $request->barcode[$i],
            'copy' => $i + 1,
            'volume' => $request->volume[$i],
            'acquisitionModality' => $request->acquisitionModality[$i],
            'acquisitionSource' => $request->acquisitionSource[$i],
            'acquisitionPrice' => $request->acquisitionPrice[$i],
            'acquisitionDate' => $request->acquisitionDate[$i],

            'management' => $request->management[$i],
            'availability' => $bandera,
            'printType' => $request->printType[$i],
            'publicationLocation' => $request->publicationLocation[$i],
            'publicationDate' => $request->publicationDate[$i],

            'book_id' => $book_id
         ]);
      }



      SearchItem::create([
        'item_id'=> $book_id,
        'type'=> '1',
        'content'=> $request[TITLE].' '.
        $request[SECUNDARY_TITLE].' '.
        $request[SUMMARY].''.
        buscarCapitulos($request['chapter']).' '.
        buscaAutores($request['primaryAuthor']).' '.
        buscaAutores($request['secondaryAuthor']).' '.
        buscaEditorial($request['editorial']).' '.
        buscaEditorial($request['secondaryEditorial']),
        'state' => true
      ]);




      return redirect('admin/book');
   }

   public function edit($id)
   {
      $books = Book::all();
      $book = Book::find($id);
      $editoriales = Editorial::all();
      $autores = Author::all();
      $chapters = ChapterBook::all();
      $bookCopies = BookCopy::all();

      return view(MBOOKS_EDIT, [
         BOOKS => $books,
         'book' => $book,
         EDITORIALES => $editoriales,
         AUTORES => $autores,
         'chapters' => $chapters,
         'bookCopies' => $bookCopies
      ]);
   }

   public function update(Request $request, $id)
   {
      $book = Book::find($id);
      $editoriales = Editorial::all();
      $autores = Author::all();

      $book->clasification = $request[CLASIFICATION];
      $book->title = $request[TITLE];
      $book->secondaryTitle = $request[SECUNDARY_TITLE];
      $book->summary = $request[SUMMARY];
      $book->isbn = $request['isbn'];
      $book->extension = $request[EXTENSION];
      $book->physicalDetails = $request[PHYSICAL_DETAILS];
      $book->dimensions = $request[DIMENSIONS];
      $book->accompaniment = $request['accompaniment'];
      $book->relationBook = 1;
      $book->edition = $request->edition;
      $book->libraryLocation = $request->libraryLocation;
      $book->save();
      $book->authors()->detach();
      $book->editorials()->detach();
      // Creando relacion de autor principal con libro
      if ($request['primaryAuthor'] != null) {
         foreach ($request['primaryAuthor'] as $autor) {
            foreach ($autores as $aut) {
               if ($autor == $aut->id) {
                  $book->authors()->attach($aut->id, [
                     'type' => true
                  ]);
                  break;
               }
            }
         }
      }

      // Creando relacion de autor secundario con libro
      if ($request['secondaryAuthor'] != null) {
         foreach ($request['secondaryAuthor'] as $autor) {
            foreach ($autores as $aut) {
               if ($autor == $aut->id) {
                  $book->authors()->attach($aut->id, [
                     'type' => false
                  ]);
                  break;
               }
            }
         }
      }
      // Creando Relacion de la editorial con libro
      if ($request['editorial'] != null) {
         foreach ($request['editorial'] as $editorial) {
            foreach ($editoriales as $edi) {
               if ($editorial == $edi->id) {
                  $book->editorials()->attach($edi->id, [
                     'type' => true
                  ]);
                  break;
               }
            }
         }
      }

      // Creando relacion de anexo con libro
      if ($request['secondaryEditorial'] != null) {
         foreach ($request['secondaryEditorial'] as $editorial) {
            foreach ($editoriales as $edi) {
               if ($editorial == $edi->id) {
                  $book->editorials()->attach($edi->id, [
                     'type' => false
                  ]);
                  break;
               }
            }
         }
      }

      // ************EDITANDO CAPITULOS******************
      // Calculando la cantidad de capitulos antiguos
      $contador_capitulos_antiguo = 0;
      foreach ($book->chapters as $chapter_aux) {
         $contador_capitulos_antiguo ++;
      }
      // Calculando la cantidad de capitulos nuevos
      $contador_capitulos_nuevo = 0;
      foreach ($request->chapter as $chapter_aux) {
         $contador_capitulos_nuevo ++;
      }
      // CASO I
      if ($contador_capitulos_nuevo == $contador_capitulos_antiguo) {
         for ($i = 0; $i < $contador_capitulos_nuevo; $i ++) {
            $book->chapters[$i]->name = $request->chapter[$i];
            $book->chapters[$i]->number = $i + 1;
            $book->chapters[$i]->book_id = $id;
            $book->chapters[$i]->save();
         }
      }
      // CASO II
      if ($contador_capitulos_nuevo < $contador_capitulos_antiguo) {
         if ($contador_capitulos_nuevo == $contador_capitulos_antiguo) {
            for ($i = 0; $i < $contador_capitulos_nuevo; $i ++) {
               $book->chapters[$i]->name = $request->chapter[$i];
               $book->chapters[$i]->number = $i + 1;
               $book->chapters[$i]->book_id = $id;
               $book->chapters[$i]->save();
            }
         }
         while ($i < $contador_capitulos_antiguo) {
            $book->chapters[$i]->delete();
            $i ++;
         }
      }
      // CASO III
      if ($contador_capitulos_nuevo > $contador_capitulos_antiguo) {
         if ($contador_capitulos_nuevo == $contador_capitulos_antiguo) {
            for ($i = 0; $i < $contador_capitulos_nuevo; $i ++) {
               $book->chapters[$i]->name = $request->chapter[$i];
               $book->chapters[$i]->number = $i + 1;
               $book->chapters[$i]->book_id = $id;
               $book->chapters[$i]->save();
            }
         }
         while ($i < $contador_capitulos_nuevo) {
            ChapterBook::create([
               'name' => $request->chapter[$i],
               'number' => $i + 1,
               'book_id' => $id
            ]);
            $i ++;
         }
      }
      // **********************EDITANDO ITEMS**********************
      // Calculando el antiguo numero de ejemplares del libro
      $numero_copias_antiguo = 0;
      foreach ($book->bookCopies as $copia_aux) {
         $numero_copias_antiguo ++;
      }

      // Calculando el nuevo numero de ejemplares del libro
      $numero_copias_nuevo = 0;
      foreach ($request['incomeNumber'] as $a) {
         $numero_copias_nuevo ++;
      }
      // Analizo los tres casos
      // CASO I
      // Como son vectores paralelos , ejem
      // $book->bookCopies[0]->barcode : antiguo codigo de barras de item1
      // $request->barcode[0] : nuevo codigo de barras de item1
      if ($numero_copias_antiguo == $numero_copias_nuevo) {
         for ($i = 0; $i < $numero_copias_nuevo; $i ++) {
            $bandera = false;
            if ($request->availability[$i] == "Disponible") {
               $bandera = true;
            }
            $copy_aux = $i + 1;
            $bc_clasification = $request->clasification . " ej. " . $copy_aux;
            if ($request->volume[$i] != null) {
               $bc_clasification = $bc_clasification . " vol." . $request->volume[$i];
            }
            $book->bookCopies[$i]->incomeNumber = $request->incomeNumber[$i];
            $book->bookCopies[$i]->clasification = $bc_clasification;
            $book->bookCopies[$i]->barcode = $request->barcode[$i];
            $book->bookCopies[$i]->copy = $i + 1;
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
      // CASO II
      if ($numero_copias_nuevo < $numero_copias_antiguo) {
         for ($i = 0; $i < $numero_copias_nuevo; $i ++) {
            $bandera = false;
            if ($request->availability[$i] == "Disponible") {
               $bandera = true;
            }
            $copy_aux = $i + 1;
            $bc_clasification = $request->clasification . " ej. " . $copy_aux;
            if ($request->volume[$i] != null) {
               $bc_clasification = $bc_clasification . " vol." . $request->volume[$i];
            }
            $book->bookCopies[$i]->incomeNumber = $request->incomeNumber[$i];
            $book->bookCopies[$i]->clasification = $bc_clasification;
            $book->bookCopies[$i]->barcode = $request->barcode[$i];
            $book->bookCopies[$i]->copy = $i + 1;
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
         while ($i < $numero_copias_antiguo) {
            $book->bookCopies[$i]->delete();
            $i ++;
         }
      }
      // CASO III
      if ($numero_copias_nuevo > $numero_copias_antiguo) {
         for ($i = 0; $i < $numero_copias_antiguo; $i ++) {
            $bandera = false;
            if ($request->availability[$i] == "Disponible") {
               $bandera = true;
            }
            $copy_aux = $i + 1;
            $bc_clasification = $request->clasification . " ej. " . $copy_aux;
            if ($request->volume[$i] != null) {
               $bc_clasification = $bc_clasification . " vol." . $request->volume[$i];
            }
            $book->bookCopies[$i]->incomeNumber = $request->incomeNumber[$i];
            $book->bookCopies[$i]->clasification = $bc_clasification;
            $book->bookCopies[$i]->barcode = $request->barcode[$i];
            $book->bookCopies[$i]->copy = $i + 1;
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
         while ($i < $numero_copias_nuevo) {
            $bandera = false;
            if ($request->availability[$i] == "Disponible") {
               $bandera = true;
            }
            $copy_aux = $i + 1;
            $bc_clasification = $request->clasification . " ej. " . $copy_aux;
            if ($request->volume[$i] != null) {
               $bc_clasification = $bc_clasification . " vol." . $request->volume[$i];
            }
            BookCopy::create([
               'incomeNumber' => $request->incomeNumber[$i],
               CLASIFICATION => $bc_clasification,
               'barcode' => $request->barcode[$i],
               'copy' => $i + 1,
               'volume' => $request->volume[$i],
               'acquisitionModality' => $request->acquisitionModality[$i],
               'acquisitionSource' => $request->acquisitionSource[$i],
               'acquisitionPrice' => $request->acquisitionPrice[$i],
               'acquisitionDate' => $request->acquisitionDate[$i],
               'management' => $request->management[$i],
               'availability' => $bandera,
               'printType' => $request->printType[$i],
               'publicationLocation' => $request->publicationLocation[$i],
               'publicationDate' => $request->publicationDate[$i],
               'book_id' => $id
            ]);
            $i ++;
         }
      }
      // *********************FIN EDITAR ITEMS**********************

      return redirect()->route('book.index');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param int $id
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
      $datos_busqueda = SearchItem::all();
      foreach ($datos_busqueda as $busqueda) {
        if ($busqueda->item_id == $id) {
          $busqueda->state = false;
        }
      }
      return redirect()->route('book.index');
   }

   public function show($id)
   {
      $book = Book::find($id);
      $book->authors()->detach();
      $book->editorials()->detach();
      $book->bookCopies()->delete();
      $book->chapters()->delete();
      $book->delete();

      return redirect()->route('book.index');

     /* $book = Book::find($id);
      if ($request->get('page') == 1) {
         return view('admin.md_books.show2')->with('book', $book);
      }
      if ($request->get('page') == 2) {
         return view('admin.md_books.show3')->with('book', $book);
      }  */
   }

   public function show2($id)
   {
      $book = Book::find($id);
      $editoriales = Editorial::all();
      $autores = Author::all();
      $chapters = ChapterBook::all();
      $bookCopies = BookCopy::all();
      return view('admin.md_books.show2', [
         'book' => $book,
         'autores' => $autores,
         'editoriales' => $editoriales,
         'chapters' => $chapters,
         'bookCopies' => $bookCopies
      ]);
   }

   public function show3($id)
   {
      $book = Book::find($id);
      return view('admin.md_books.show3', [
         'book' => $book
      ]);
   }

   public function content()
   {}
}
