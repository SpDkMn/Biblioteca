<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
	protected $table = 'editorials';

	protected $fillable=['name'];

    public function categories(){
    	return $this->belongsToMany('\App\Category','editorial_category');
    }
     public function scopeName($query,$name){
		if(trim($name)!=""){
			return $query->where('name',"LIKE","%$name%");
		}
    }

}
