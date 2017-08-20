<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCopy extends Model
{
   use SoftDeletes;

   protected $table = 'book_copies';

   protected $fillable = [
      'incomeNumber',
      'clasification',
      'barcode',
      'copy',
      'volume',
      'acquisitionModality',
      'acquisitionSource',
      'acquisitionPrice',
      'acquisitionDate',
      'management',
      'availability',
      'printType',
      'publicationLocation',
      'publicationDate',
      'book_id'
   ];

   protected $dates = [
      'deleted_at'
   ];

   public function book()
   {
      return $this->belongsto('App\Book');
   }
   public function book2()
   {
      return $this->hasOne('App\Book','id');
   }
}
