<?php
namespace App;
  
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
  
  class Configuration extends Model
  {
     //
     use SoftDeletes;
    protected $fillable = [
        'tiPrestamo','tcPrestamo','tReserva','diaFeriado','rangoFeriado','activador'
    ];
     /**
      * The attributes that should be mutated to dates.
      *
      * @var array
      */
     protected $dates = ['deleted_at'];
 
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'name', 'JSON' ];
  }