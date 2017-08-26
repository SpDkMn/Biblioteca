<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
   use SoftDeletes;

   use Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'name',
      'last_name',
      'code',
      'dni',
      'password',
      'home_phone',
      'phone',
      'school',
      'id_user_type',
      'email',
      'address',
      'username',
      'faculty',
      'university',
      'state', // 0 -> no castigado  // 1 -> castigado
      'register'// 0 -> con contraseña // 1 -> sin contrasenia
   ];

   /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = [
      'deleted_at'
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
      'password',
      'remember_token'
   ];



   public function employee()
   {
      return $this->hasMany('App\Employee');
   }



   //lo uso para el login
   public function employee2(){
      return $this->hasOne('App\Employee','id');
   }

   public function user_type()
   {
      return $this->belongsTo('App\UserType');
   }

   public function order()
    {
      return $this->hasOne('App\Order','id_user');



    }

}
