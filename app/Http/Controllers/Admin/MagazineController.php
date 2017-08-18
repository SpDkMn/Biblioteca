<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Author as Author;
use App\Magazine as Magazine;
use App\MagazineCopy as MagazineCopy;
use App\Editorial as Editorial;
use App\Content as Content;
use App\SearchItem as SearchItem;
// Nota: Reducir la funciones al terminar todos los modulos
class MagazineController extends Controller
{
   // Terminado
   public function index()
   {
      $editoriales = Editorial::all();
      $autores = Author::all();
      $revistas = Magazine::all();
      $copias_revistas = MagazineCopy::all();
      $contenidos = Content::all();
      $delete = view('admin.md_magazines.delete');
      $content = view('admin.md_magazines.content', [
         'revistas' => $revistas,
         'id' => null
      ]);
      $item = view('admin.md_magazines.items', [
         'id' => null,
         'revistas' => $revistas
      ]);
      // Enviando arreglos -> Autores , editoriales , revistas , copias_revistas
      $new = view('admin.md_magazines.new', [
         'autores' => $autores,
         'editoriales' => $editoriales
      ]);
      $show = view('admin.md_magazines.show', [
         'revistas' => $revistas,
         'copias_revistas' => $copias_revistas,
         'contenidos' => $contenidos,
         'editoriales' => $editoriales,
         'autores' => $autores
      ]);
      $edit = view('admin.md_magazines.edit', [
         'revistas' => $revistas,
         'copias_revistas' => $copias_revistas,
         'contenidos' => $contenidos,
         'editoriales' => $editoriales,
         'autores' => $autores,
         // Definiendo las variables para editar
         'id' => null,
         'autores' => null
      ]);
      return view('admin.md_magazines.index', [
         'new' => $new,
         'show' => $show,
         'edit' => $edit,
         'delete' => $delete,
         'content' => $content,
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

     $magazines = Magazine::all();
      // Declarando contadores
      $contador_contenido = 0;
      $contador_copia = 0;
      // Contando los contenidos de la revista
      $contador_contenido = sizeof($request['titleContent']);
      // Contando las copias de la revista
      $contador_copia = sizeof($request['incomeNumber']);
      function cambiaCadena($str){return intval(preg_replace('/[^0-9]+/', '', $str), 10);}
      function buscaEAcademica($id){
        if (is_string($id)) {
          $id = cambiaCadena($id);
        }
        return Author::find($id);
      }
      function buscaColaborador($id){
        $string_colaborador = "";
        if (is_string($id)) {
          $id = cambiaCadena($id);
        }
        $autor = Author::find($id);
        if ($autor!=null) {
          foreach ($autor as $key => $value) {
           $string_colaborador = $string_colaborador.''.$value->name ;
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
      //Parametro = $arreglo
      function buscaContenido($contenidos){
        $string_contenido = "";
        foreach ($contenidos as $key => $value) {
         $string_contenido = $string_contenido.' '.$value;
        }
        return $string_contenido;
      }
      //Concatenando a los colaboradores
      $string_colaboradores = "";
      for ($i=0; $i < $contador_contenido ; $i++) {
        $string_colaboradores = $string_colaboradores.' '.buscaColaborador($request['collaborator'.$i]);
      }
      //Guardamos los registros de las revistas para capturar el id de la revista
      //VALIDANDO DATOS DE ENTRADA
      $validator = Validator::make($request->all(), [
          'title' => 'required|unique:magazines|max:255',
          'issn' => 'required|unique:magazines',
          'issnD' => 'unique:magazines',
          'volumen' => 'required',
          'numero' => 'required||min:0||max:100',
          'fechaEdicion' => 'required',
          'incomeNumber'   =>  'required|unique:magazine_copies',
          'barcode'        =>  'required',
          'titleContent'  => 'required'
          ])->validate();
      // Guardando los datos de la revista
      Magazine::create([
         'title' => $request['title'],
         'subtitle' => $request['subtitle'],
         'issn' => cambiaCadena($request['issn']),
         'issnD' => cambiaCadena($request['issnD']),
         'volumen' => $request['volumen'],
         'numero' => $request['numero'],
         'author_id' => $request['author'],
         'fechaEdicion' => $request['fechaEdicion']
      ]);
      // Capturando id de la revista ingresada luego de crearla
      //ESTO TIENE QUE ESTAR ACA PARA QUE CARGUE LUEGO DE SER AGREGADA LA ULTIMA REVISTA
      $magazines = Magazine::all();
      $id_magazine = $magazines->last()->id;
      //Creacion la tabla para la busqueda
      // Guardando datos de las copias de revistas
      for ($j = 0; $j < $contador_copia; $j ++) {
         MagazineCopy::create([
            'incomeNumber' => $request['incomeNumber'][$j],
            'barcode' => cambiaCadena($request['barcode'][$j]),
            'copy' => $request['copy'][$j],
            'magazine_id' => $id_magazine
         ]);
      }
      // Guardando los titulos de los contenidos de una revista
      // Este bucle tiene que ir antes del bucle que asocia los contenidos y los autores
      for ($i = 0; $i < $contador_contenido; $i ++) {
         Content::create([
            'title' => $request["titleContent"][$i],
            'magazine_id' => $id_magazine
         ]);
      }
      // RELACIONANDO LAS TABLAS PIVOTES
      // Pivot -> Content - author
      foreach ($magazines as $magazine) {
         if ($magazine->id == $id_magazine) {
            // Recorre los contenidos de cada revista
            $cont = 0;
            foreach ($magazine->contents as $content) {
               if ($content->magazine_id == $id_magazine && $request["collaborator" . $cont] != null) {
                  foreach ($request["collaborator" . $cont] as $clave => $id) {
                     $content->authors()->attach($id);
                  }
               }
               $cont = $cont + 1;
            }
         }
      }
      // Pivot-> Magazine - Editorial
      foreach ($magazines as $magazine) {
         // Editoriales anexadas
         if ($request['mEditorialSecond']!= null) {
            foreach ($request['mEditorialSecond'] as $clave => $id) {
               if ($magazine->id == $id_magazine) {
                  $magazine->editorials()->attach($id, [
                     'type' => false
                  ]);
               }
            }
         }
         // Editorial Primaria
         foreach ($request['mEditorialMain'] as $clave => $id) {
            if ($magazine->id == $id_magazine) {
               $magazine->editorials()->attach($id, [
                  'type' => true
               ]);
            }
         }
      }
      SearchItem::create([
        'item_id'=> $id_magazine,
        'type'=> '3',
        'content'=> $request['title'].' '.
        $request['subtitle'].' '.
        buscaEAcademica($request['author'])->name.' '.
        buscaEditorial($request['mEditorialMain']).' '.
        buscaEditorial($request['mEditorialSecond']).' '.
        buscaContenido($request['titleContent']).' '.
        $string_colaboradores ,
        'state' => true
      ]);
      // Redireccionamos a la seccion de revistas
      return redirect('admin/magazines');
   }
   // Terminado
   public function edit($id)
   {
      $revistas = Magazine::all();
      $autores = Author::all();
      $editorial = Editorial::find($id);
      $editoriales = Editorial::all();
      $contents = Content::all();
      return view('admin.md_magazines.edit', [
         'id' => $id,
         'revistas' => $revistas,
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
      $revistaP = Magazine::find($id);
      $revista = Magazine::find($id);
      // Inicializando contadores
      $contador_contenido = 0;
      $contador_contenido2 = 0;
      // Asignando
      // Copias de la revista a editar
      $copiasR = $revista->magazines_copies;
      // CONTENIDO DE REVISTA
      // Contenidos de la revista a editar
      $contentsR = $revista->contents;
      // Contando las contenidos de la revista antes de editar ($contador_contenido2)
      $contador_contenido2 = count($contentsR);
      // Contando los contenidos luego de editar ($contador_contenido)
      $contador_contenido = sizeof($request['titleContent']);
      // COPIAS DE REVISTA
      // Items antes de editar
      $countB = count($copiasR);
      // Items luego de editar
      $countA = sizeof($request['incomeNumber']);
      // Actualizando datos de revista
      $revista->title = $request['title'];
      $revista->subtitle = $request['subtitle'];
      $revista->issn = $request['issn'];
      $revista->issnD = $request['issnD'];
      $revista->fechaEdicion = $request['fechaEdicion'];
      $revista->volumen = $request['volumen'];
      $revista->numero = $request['numero'];
      if (is_string($request['author'])) {
         $request['author'] = (int) $request['author'];
      }
      $revista->author_id = $request['author'];
      // Actualizacion de datos de los items
      for ($i = 0; $i < $countB; $i ++) {
         $copiaEliminada = $revista->magazines_copies[$i];
         $copiaEliminada->delete();
      }
      for ($j = 0; $j < $countA; $j ++) {
         MagazineCopy::create([
            'incomeNumber' => $request['incomeNumber'][$j],
            'barcode' => $request['barcode'][$j],
            'copy' => $request['copy'][$j],
            'magazine_id' => $id
         ]);
      }
      // Agregando Los nuevos Contenidos que se han agregado en editar
      for ($i = $contador_contenido2; $i < $contador_contenido; $i ++) {
         Content::create([
            'title' => $request["titleContent"][$i],
            'magazine_id' => $id
         ]);
      }
      // Actualizando contenido
      for ($i = 0; $i < $contador_contenido2; $i ++) {
         $revista->contents[$i]->title = $request["titleContent"][$i];
         $contentsR[$i]->save();
      }
      // Borramos las relaciones entre contenidos y colaboradores
      foreach ($revistaP->contents as $contentR) {
         $contentR->authors()->detach();
      }
      // Inicializando contador
      $cont = 0;
      // Añadiendo nuevas relaciones entre contenidos y colaboradores
      foreach ($revistaP->contents as $contentR) {
         if ($request["collaborator" . $cont] != null) {
            foreach ($request["collaborator" . $cont] as $clave => $id) {
               $contentR->authors()->attach($id);
            }
            $cont ++;
         }
      }
      // Borramos las relaciones entre revistas y editoriales solo cuando se hace una modificacion
      // si no se modifica esto no es necesario eliminar las relaciones para luego relacionarlos denuevo
      $revista->editorials()->detach();
      // Relacionamos nuevamente revistas con editoriales
      // Editoriales Anexadas
      if ($request['mEditorialSecond'] != null) {
         foreach ($request['mEditorialSecond'] as $clave => $valor) {
            $revista->editorials()->attach($valor, [
               'type' => false
            ]);
         }
      }
      // Editorial Primaria -> Dato obligatorio
      if ($request['mEditorialMain'] != null) {
        foreach ($request['mEditorialMain'] as $clave => $valor2) {
           $revista->editorials()->attach($valor2, [
              'type' => true
           ]);
        }
      }
      $revista->save();
      return redirect('admin/magazines');
   }
   // Terminado
   public function destroy($id)
   {
     function cambiaCadena($str){return intval(preg_replace('/[^0-9]+/', '', $str), 10);}
     $id = cambiaCadena($id);

      $magazine = Magazine::find($id);
      $copias = MagazineCopy::all();
      $contents = Content::all();
      // Eliminando contenidos relacionados a la revista a destruir
      foreach ($contents as $content) {
         if ($content->magazine_id == $id) {
            $content->delete();
         }
      }
      // Eliminando copias relacionados a la revista a destruir
      foreach ($copias as $copia) {
         if ($copia->magazine_id == $id) {
            $copia->delete();
         }
      }
      // Las tablas pivotes se eliminaron usando ->onDelete('cascade')
      //CAMBIANDO EL ESTADO DE LA REVISTA ELIMINADA EN LA TABLA DE DATOS A BUSCAR
      $datos_busqueda = SearchItem::all();
      foreach ($datos_busqueda as $busqueda) {
        if ($busqueda->item_id == $id) {
          $busqueda->state = false;
        }
      }
      //FIN DE LA ACTUALIZACION DE LA TABLA DE BUSQUEDA

      $magazine->delete();
      return redirect('admin/magazines');
   }
   // Terminado
   public function content($id)
   {
      $revistas = Magazine::all();
      return view('admin.md_magazines.content', [
         'id' => $id,
         'revistas' => $revistas
      ]);
   }
   // Terminado
   public function itemDetail($id)
   {
      $revistas = Magazine::all();
      return view('admin.md_magazines.items', [
         'revistas' => $revistas,
         'id' => $id
      ]);
   }
}
