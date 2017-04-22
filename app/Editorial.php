<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model{

	protected $table = 'editorials';
	protected $fillable=['name'];

	//Una editorial pertenece a muchas revistas
	public function magazines(){
		return $this->belongsToMany('App\Magazine','editorial_magazine');
	}

    public function categories(){
    	return $this->belongsToMany('\App\Category','editorial_category');
    }

     public function scopeName($query,$name){
		if(trim($name)!=""){
			return $query->where('name',"LIKE","%$name%");
		}
    }

}
