<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';
  protected $fillable = [
    'startDate',
    'search',
    'typeItem',
    'place',
    'id_user',
    'id_copy'
  ];

  public function loans(){
     return $this->hasOne('App\Loan');
  }




}
