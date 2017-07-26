<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SummaryThesis extends Model
{

   protected $table = 'summaries_thesis';

   protected $fillable = [
      'name',
      'thesis_id'
   ];
}
