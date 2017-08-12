<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

   protected $fillable = [
      // Claves foraneaas agregadas - > miercoles 08/03 - 12:08 am
      'title',
      'magazine_id',
      'compendium_id'
   ];

   // Un contenido tiene uno o muchos autores
   public function authors()
   {
      return $this->belongsToMany('App\Author', 'author_content');
   }

   // Un contenido pertenece a una revista
   public function magazine()
   {
      return $this->belongsTo('App\Magazine');
   }

   public function compendium()
   {
      return $this->belongsTo('App\Compendium');
   }
}
