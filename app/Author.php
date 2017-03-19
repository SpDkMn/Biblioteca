<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  //Esta es la rama de Jose Gonzalez

  	protected $table = 'authors';

  	protected $fillable=['name'];

    public function categories(){

    	return $this->belongsToMany('\App\Category','auth_cat');

    }

    public function scopeName($query,$name){
    	if(trim($name)!=""){
    		$query->where('name',"LIKE","%$name%");
    	}
    }

    public function scopeCategory($query,$category){
      $categories=['Libro'=>'Libro','Revista'=>'Revista','Tesis'=>'Tesis','Compendio'=>'Compendio'];
      if($category!="" && isset($categories[$category])){
        $query->where('Category',$category);
      }
    }

}
