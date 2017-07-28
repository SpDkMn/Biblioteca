<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Configuration extends Model
{
   //
   use SoftDeletes;
   protected $fillable = ['startMonday','startTuesday','startWednesday','startThursday','startFriday','startSaturday','startSunday','endMonday','endTuesday','endWednesday','endThursday','endFriday','endSaturday','endSunday'];
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