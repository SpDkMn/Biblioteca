<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $fillable=['name'];

    public function editorials(){
    	return $this->belongsToMany('\App\Editorial','editorial_category');
    }

    public function authors(){
    	return $this->belongsToMany('\App\Author','author_category');
    }

    //Esto agregue para agregar el campo tipo (si es tesis o tesina)
    public function thesiss(){
    	return $this->hasMany('App\Thesis');
    }
}
