<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Penalty extends Model
{
   use SoftDeletes;


   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'userId',
      'employeeId',
      'penaltyOrderId',
      'categoryId',
      'objectId',
      'startPenalty',
      'endPenalty',
      'activity',
      //0 ---> desactivado
      //1 ---> activado
      //2 ---> en cola
      'event'
   ];

   /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = [
      'deleted_at'
   ];
   public function user()
   {
     return $this->belongsTo('App\User','userId');
   }
   public function employee()
   {
     return $this->belongsTo('App\Employee','employeeId');
   }
   public function penaltyOrder()
   {
     return $this->belongsTo('App\PenaltyOrder','penaltyOrderId');
   }
}
