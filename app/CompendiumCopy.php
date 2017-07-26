<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CompendiumCopy extends Model
{

   protected $fillable = [
      // copy->ejemplar
      'incomeNumber',
      'copy',
      'compendium_id'
   ];

   public function compendium()
   {
      return $this->belongsTo('App\Compendium');
   }
}
