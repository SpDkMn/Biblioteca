<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fullcalendarevento extends Model
{
    protected $table = 'fullcalendareventos';
    protected $fillable = ['fechaIni','fechaFin','todoeldia','color','titulo'];
    protected $hidden = ['id'];
}
