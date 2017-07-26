<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuration extends Model
{
   //
   use SoftDeletes;

   protected $fillable = [
      'mondaySetting',
      'tuesdaySetting',
      'wednesdaySetting',
      'thursdaySetting',
      'fridaySetting',
      'saturdaySetting',
      'undaySetting',
      'startMonday',
      'startTuesday',
      'startWednesday',
      'startThursday',
      'startFriday',
      'startSaturday',
      'endSunday',
      'endMonday',
      'ndTuesday',
      'endWednesday',
      'endThursday',
      'endFriday',
      'endSaturday',
      'endSunday'
   ];

   /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = [
      'deleted_at'
   ];

/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
}