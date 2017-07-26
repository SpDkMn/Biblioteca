<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChapterBook extends Model
{
   use SoftDeletes;

   protected $table = 'chapters_book';

   protected $fillable = [
      'name',
      'number',
      'book_id'
   ];

   protected $dates = [
      'deleted_at'
   ];
}
