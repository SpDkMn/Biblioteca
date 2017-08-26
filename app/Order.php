<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';
  protected $fillable = [
    'startDate',
    // 'search',
    'typeItem',
    'place',
      // 0 : sala
      // 1 : domicilio
    'id_user',
    'id_item',
    'copy',
    //Estos serán editados en prestamo
    'state',
      // 0 : en espera
      // 1 : aceptado
      // 2 : rechazado
    'endDate',
  ];
  public function user()
   {
      return $this->belongsTo('App\User','id_user');
           
      

   }
}
