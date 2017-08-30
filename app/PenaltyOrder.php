<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class PenaltyOrder extends Model
{
   use SoftDeletes;
   

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'order',
      'penaltyTime',
      'penaltyType_id'
   ];

   /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = [
      'deleted_at'
   ];
   public function typePenalty()
   {
      return $this->belongsTo('App\TypePenalty','penaltyType_id');
   }


   public function penalties()
    {
      return $this->hasMany('App\Penalty','penaltyOrderId');
    }
}

