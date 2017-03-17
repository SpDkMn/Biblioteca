<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $fillable = ['name'];

    //Un autor pertenece a una revista
    public function magazine(){
    	return $this->hasMany('App\Magazine');
    }
    //Un autor (Colaborador) pertenece a un contenido
    public function contents(){
    	return $this->belongsToMany('App\Content','author_content');
    }
    //Un autor pertenece a muchas categorias
    public function categories(){
        return $this->belongsToMany('App\Category','author_category');
    }
}
