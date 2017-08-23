<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
   protected $table = 'loans';
   protected $fillable = [
     'availability',
     'endDate',
     'id_order'
   ];

   public function order(){
      return $this->hasOne('App\Order');
   }
}
