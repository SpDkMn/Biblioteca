<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $table = 'authors';

	protected $fillable=['name'];
  public function categories(){
    return $this->belongsToMany('\App\Category','author_category');
  }

  public function scopeName($query,$name){
    if(trim($name)!=""){
      return $query->where('name',"LIKE","%$name%");
		}
    }

}
