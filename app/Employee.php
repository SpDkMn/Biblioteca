<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
   use SoftDeletes;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'code',
      'password',
      'user_id',
      'profile_id'
   ];

   // Un empleado pertenece (es) un Usuario
   public function user()
   {
      return $this->belongsTo('App\User');
   }

   // Un empleado pertenece (tiene) un perfil
   public function profile()
   {
      return $this->belongsTo('App\Profile');
   }

   public function profile2(){
      return $this->hasOne('App\Profile','id');
   }

   /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = [
      'deleted_at'
   ];
}
