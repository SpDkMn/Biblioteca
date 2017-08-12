<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Author as Author;
use App\Compendium as Compendium;
use App\CompendiumCopy as CompendiumCopy;
use App\Editorial as Editorial;
use App\Content as Content;
// Nota: Reducir la funciones al terminar todos los modulos
class CompendiumController extends Controller
{
   // Terminado
   public function index()
   {
      $editoriales = Editorial::all();
      $autores = Author::all();
      $contenidos = Content::all();
      $compendios = Compendium::all();
      $copias_compendios = CompendiumCopy::all();
      $delete = view('admin.md_compendium.delete');
      $content = view('admin.md_compendium.content', [
         'compendios' => $compendios,
         'id' => null
      ]);
      $introduccion = view('admin.md_compendium.introduccion', [
         'compendios' => $compendios,
         'id' => null
      ]);
      $item = view('admin.md_compendium.items', [
         'id' => null,
         'compendios' => $compendios
      ]);
      // Enviando arreglos -> Autores , editoriales , compendioss , copias_compendios
      $new = view('admin.md_compendium.new', [
         'autores' => $autores,
         'editoriales' => $editoriales
      ]);
      $show = view('admin.md_compendium.show', [
         'compendios' => $compendios,
         'copias_compendios' => $copias_compendios,
         'contenidos' => $contenidos,
         'editoriales' => $editoriales,
         'autores' => $autores
      ]);
      $edit = view('admin.md_compendium.edit', [
         'compendios' => $compendios,
         'copias_compendios' => $copias_compendios,
         'contenidos' => $contenidos,
         'editoriales' => $editoriales,
         'autores' => $autores,
         // Definiendo las variables para editar
         'id' => null,
         'autores' => null
      ]);
      return view('admin.md_compendium.index', [
         'new' => $new,
         'show' => $show,
         'edit' => $edit,
         'delete' => $delete,
         'content' => $content,
         'introduccion' => $introduccion,
         'item' => $item
      ]);
   }
   // Funcion no usada
   public function create()
   {
      // Funcion no usada
   }
   // Terminado
   public function store(Request $request)
   {
      function cambiaCadena($str)
      {
         return intval(preg_replace('/[^0-9]+/', '', $str), 10);
      }
      // Almacenamos lo que el usuario ingresa
      // Declarando contadores
      $contador_contenido = 0;
      $contador_copia = 0;
      // Contando los contenidos de la compendio
      while ($request['titleContent' . $contador_contenido] != null) {
         $contador_contenido ++;
      }
      // Contando las copias de la compendio
      while ($request['incomeNumber' . $contador_copia] != null) {
         $contador_copia ++;
      }
      // Guardando los datos de la compendio
      Compendium::create([
         'title' => $request['title'],
         'introduccion' => $request['introduccion'],
         'volumen' => $request['volumen'],
         'numero' => $request['numero'],
         'author_id' => $request['author'],
         'editorial_id' => $request['editorial'],
         'fechaEdicion' => $request['fechaEdicion']
      ]);
      // Guardamos los registros de las compendios
      $compendios = Compendium::all();
      // Capturando id de la compendio ingresada
      foreach ($compendios as $compendio) {
         $i = 0;
         if ($compendio->title == cambiaCadena($request['title'])) {
            $id_compendium = $compendio->id;
         }
         $i ++;
      }
      // Guardando datos de las copias de compendios
      for ($j = 0; $j < $contador_copia; $j ++) {
         CompendiumCopy::create([
            'incomeNumber' => $request['incomeNumber' . $j],
            'copy' => $request['copy' . $j],
            'compendium_id' => $id_compendium
         ]);
      }
      // Guardando los titulos de los contenidos de una compendio
      // Este bucle tiene que ir antes del bucle que asocia los contenidos y los autores
      for ($i = 0; $i < $contador_contenido; $i ++) {
         Content::create([
            'title' => $request["titleContent" . $i],
            'compendium_id' => $id_compendium,
            'magazine_id' => null
         ]);
      }
      // RELACIONANDO LAS TABLAS PIVOTES
      // Pivot -> Content - author
      foreach ($compendios as $compendio) {
         if ($compendio->id == $id_compendium) {
            // Recorre los contenidos de cada compendio
            $cont = 0;
            foreach ($compendio->contents as $content) {
               // Si el contenido esta relacionado con la compendio
               if ($content->compendium_id == $id_compendium && $request["collaborator" . $cont] != null) {
                  foreach ($request["collaborator" . $cont] as $id) {
                     $content->authors()->attach($id);
                  }
               }
               $cont = $cont + 1;
            }
         }
      }
      // Redireccionamos a la seccion de compendios
      return redirect('admin/compendium');
   }
   // Terminado
   public function edit($id)
   {
      $compendios = Compendium::all();
      $autores = Author::all();
      $editorial = Editorial::find($id);
      $editoriales = Editorial::all();
      $contents = Content::all();
      return view('admin.md_compendium.edit', [
         'id' => $id,
         'compendios' => $compendios,
         // Para la carga de opciones de editoriales y colaboradores
         'editoriales' => $editoriales,
         'editorial' => $editorial,
         'contents' => $contents,
         'autores' => $autores
      ]);
   }
   // Terminado - Falta optimizar
   public function update(Request $request, $id)
   {
      // Obteniendo datos
      $compendio = Compendium::find($id);
      // Inicializando contadores
      $contador_contenido = 0;
      $contador_contenido2 = 0;
      // Asignando
      // Copias de la compendio a editar
      $copiasR = $compendio->Compendium_copies;
      // CONTENIDO DE compendio
      // Contenidos de la compendio a editar
      $contentsR = $compendio->contents;
      // Contando las contenidos de la compendio antes de editar ($contador_contenido2)
      foreach ($contentsR as $contentR) {
         $contador_contenido2 ++;
      }
      // Contando los contenidos luego de editar ($contador_contenido)
      while ($request['titleContent' . $contador_contenido] != null) {
         $contador_contenido ++;
      }
      // COPIAS DE compendio
      // Items antes de editar
      $countB = count($copiasR);
      // Items luego de editar
      $countA = sizeof($request['incomeNumber']);
      // Actualizando datos de compendio
      $compendio->title = $request['title'];
      $compendio->introduccion = $request['introduccion'];
      $compendio->fechaEdicion = $request['fechaEdicion'];
      $compendio->numero = $request['numero'];
      if (is_string($request['author'])) {
         $request['author'] = (int) $request['author'];
      }
      $compendio->author_id = $request['author'];
      if (is_string($request['editorial'])) {
         $request['editorial'] = (int) $request['editorial'];
      }
      $compendio->editorial_id = $request['editorial'];
      // Actualizacion de datos de los items
      for ($i = 0; $i < $countB; $i ++) {
         $copiaEliminada = $compendio->compendium_copies[$i];
         $copiaEliminada->delete();
      }
      for ($j = 0; $j < $countA; $j ++) {
         CompendiumCopy::create([
            'incomeNumber' => $request['incomeNumber'][$j],
            'copy' => $request['copy'][$j],
            'compendium_id' => (int) $id
         ]);
      }
      // Agregando Los nuevos Contenidos que se han agregado en editar
      for ($i = $contador_contenido2; $i < $contador_contenido; $i ++) {
         Content::create([
            'title' => $request["titleContent" . $i],
            'compendium_id' => $id
         ]);
      }
      // Actualizando contenido
      for ($i = 0; $i < $contador_contenido2; $i ++) {
         $compendio->contents[$i]->title = $request["titleContent" . $i];
         $contentsR[$i]->save();
      }
      $compendio->save();
      return redirect('admin/compendium');
   }
   // Terminado
   public function destroy($id)
   {
      $compendio = Compendium::find($id);
      $copias = CompendiumCopy::all();
      $contents = Content::all();
      // Eliminando contenidos relacionados a la compendio a destruir
      foreach ($contents as $content) {
         if ($content->compendium_id == $id) {
            $content->delete();
         }
      }
      // Eliminando copias relacionados a la compendio a destruir
      foreach ($copias as $copia) {
         if ($copia->compendium_id == $id) {
            $copia->delete();
         }
      }
      // Las tablas pivotes se eliminaron usando ->onDelete('cascade')
      $compendio->delete();
      return redirect('admin/compendium');
   }
   // Terminado
   public function content($id)
   {
      $compendios = Compendium::all();
      return view('admin.md_compendium.content', [
         'id' => $id,
         'compendios' => $compendios
      ]);
   }
   // Terminado
   public function introduccion($id)
   {
      $compendios = Compendium::all();
      return view('admin.md_compendium.introduccion', [
         'id' => $id,
         'compendios' => $compendios,
      ]);
   }
   // Terminado
   public function itemDetail($id)
   {
      $compendios = Compendium::all();
      return view('admin.md_compendium.items', [
         'compendios' => $compendios,
         'id' => $id
      ]);
   }
}