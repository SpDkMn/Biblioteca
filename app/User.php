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
      'state'
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

   public function scopeSearch($query, $nombres, $nombres_2, $nombres_cadena)
   {
      $arreglo_1 = explode(" ", $nombres_cadena, 2);
      $cadenasa = $nombres . $nombres_2 . $nombres_cadena;
      
      if ($nombres == null || $nombres == "todos") {
         if ($nombres_2 == null || $nombres_2 == "todos") {
            if ($arreglo_1[0] == null || $arreglo_1[0] == "todos") {
               if ($arreglo_1[1] == null || $arreglo_1[1] == "") {
                  // caso 1
                  return $query;
               } else {
                  // Caso 15
                  
                  return $query->where("union", 'LIKE', "%$arreglo_1[1]%");
                  // ,'OR','name','LIKE',"%$arreglo_1[1]%",'OR','dni','LIKE',"%$arreglo_1[1]%"
               }
            } else {
               if ($arreglo_1[1] == null || $arreglo_1[1] = "") {
                  // Caso 14
                  return $query;
               } else {
                  // Caso 13
                  return $query->where("union", 'LIKE', "%$arreglo_1[1]%");
               }
            }
         } else {
            if ($arreglo_1[0] == null || $arreglo_1[0] == "todos") {
               if ($arreglo_1[1] == null || $arreglo_1[1] = "") {
                  // Caso 12
                  return $query->where("academic_type", '=', "$nombres_2");
               } else {
                  // Caso 11
                  return $query->where('academic_type', '=', "$nombres_2", 'AND', "union", 'LIKE', "%$arreglo_1[1]%");
               }
            } else {
               if ($arreglo_1[1] == null || $arreglo_1[1] = "") {
                  // Caso 10
                  return $query->where("academic_type", '=', "$nombres_2");
               } else {
                  // Caso 9
                  return $query->where("academic_type", '=', "$nombres_2", 'AND', "union", 'LIKE', "%$arreglo_1[1]%");
               }
            }
         }
      } else {
         if ($nombres_2 == null || $nombres_2 == "todos") {
            if ($arreglo_1[0] == null || $arreglo_1[0] == "todos") {
               if ($arreglo_1[1] == null || $$arreglo_1[1] = "") {
                  // Caso 8
                  return $query->where("school", '=', "$nombres");
               } else {
                  // Caso 7
                  return $query->where('school', '=', "$nombres", 'AND', "union", 'LIKE', "%$arreglo_1[1]%");
               }
            } else {
               if ($arreglo_1[1] == null || $arreglo_1[1] = "") {
                  // Caso 6
                  return $query->where("school", '=', "$nombres");
               } else {
                  // Caso 5
                  return $query->where('school', '=', "$nombres", 'AND', "union", 'LIKE', "%$arreglo_1[1]%");
               }
            }
         } else {
            if ($arreglo_1[1] == null || $arreglo_1[1] = "") {
               // Caso 4 | 2
               return $query->where('school', '=', "$nombres", 'AND', "academic_type", '=', "$nombres_2");
            } else {
               // Caso 3 | 1
               return $query->where('school', '=', "$nombres", 'AND', "academic_type", '=', "$nombres_2", 'AND', "union", 'LIKE', "%$arreglo_1[1]%");
            }
         }
      }
   }

   public function employee()
   {
      return $this->hasMany('App\Employee');
   }

   public function user_type()
   {
      return $this->belongsto('App\UserType');
   }
}
