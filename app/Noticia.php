<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model
{
   use SoftDeletes;

   protected $fillable = [
      'titulo',
      'contenido',
      'palabra_clave',
      'urlImg',
      'localizacion'
   ];

   protected $dates = [
      'deleted_at'
   ];

   public function setUrlImgAttribute($urlImg)
   {
      if ($urlImg && !is_string($urlImg)) {
         $this->attributes['urlImg'] = time() . $urlImg->getClientOriginalName();
         $name = time() . $urlImg->getClientOriginalName();
         \Storage::disk('local')->put($name, \File::get($urlImg));
      }
   }
}