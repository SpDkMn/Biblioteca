<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{

   protected $table = 'thesiss';

   protected $fillable = [
      'type',
      'clasification',
      'title',
      'edition',
      'escuela',
      'extension',
      'dimensions',
      'physicalDetails',
      'accompaniment',
      'conten',
      'summary',
      'recomendacion',
      'bibliografia',
      'location',
      'publicationLocation',
      'author_id'
   ];

   public function thesisCopies()
   {
      return $this->hasMany('App\ThesisCopy');
   }

   public function editorials()
   {
      return $this->belongsToMany('App\Editorial', 'editorial_thesis');
   }

   public function authors()
   {
      return $this->belongsToMany('App\Author', 'author_thesis')->withPivot('type');
   }

   public function chapters()
   {
      return $this->hasMany('App\ChapterThesis');
   }

   public function summaries()
   {
      return $this->hasMany('App\SummaryThesis');
   }

   // Esto agregue para agregar el campo tipo (si es tesis o tesina)
   public function categories()
   {
      return $this->belongsTo('App\Category');
   }
}
 