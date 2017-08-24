<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
   protected $table = 'loans';
   protected $fillable = [

   ];

   public function order(){
      return $this->hasOne('App\Order');
   }
}
