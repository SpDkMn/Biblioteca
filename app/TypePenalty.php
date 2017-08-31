<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class TypePenalty extends Model
{
    use SoftDeletes;
  

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'symbol',
      'cause'
   ];

   /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = [
      'deleted_at'
   ];
   public function penaltyOrders()
   {
      return $this->hasMany('App\PenaltyOrder','penaltyType_id');
   }

   

}
