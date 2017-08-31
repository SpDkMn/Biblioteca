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
   /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = [
      'deleted_at'
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

<<<<<<< HEAD
   /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = [
      'deleted_at'
   ];
   public function penalties()
    {
      return $this->hasMany('App\Penalty','employeeId');
    }
=======
   public function penalties(){
      return $this->hasMany('App\Penalty','employeeId');
    }

>>>>>>> f6b2c01f0fc262026f1e81e6217725019bb755f7
}
