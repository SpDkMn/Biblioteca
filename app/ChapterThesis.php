<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ChapterThesis extends Model
{

   protected $table = 'chapters_thesis';

   protected $fillable = [
      'name',
      'thesis_id'
   ];
}
