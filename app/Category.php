<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


	protected $fillable = [
	   //Claves foraneaas agregadas - > miercoles 08/03 - 12:08 am
		'name'
	];



	//Una categoria tiene uno o muchos autores
	public function authors(){
		return $this->belogsToMany('App\Author','author_category');//(,tableName)
	}
	//Una categoria tiene una o muchas editoriales
	public function editorials(){
		return $this->belogsToMany('App\Editorial','category_editorial');
	}


}
