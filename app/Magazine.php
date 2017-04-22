<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
	//Datos guardados en la tabla
    protected $fillable = [
        'title','issn','author_id'
    ];

    //Una revista tiene una o más copias
	public function magazines_copies(){
		return $this->hasMany('App\MagazineCopy');
	}

    //Una revista tiene una o más editoriales
    public function editorials(){
        return $this->belongsToMany('App\Editorial','editorial_magazine')->withPivot('type');
    }

    //Una revista tiene un autor
    public function author(){
        return $this->belongsTo('App\Author');
    }

    //Una revista tiene uno o más contenidos
    public function contents(){
        return $this->hasMany('App\Content');
    }

}
