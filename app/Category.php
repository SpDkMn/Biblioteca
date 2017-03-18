<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';
	protected $fillable=['name'];

    public function authors(){
    	return $this->belongsToMany('\App\Author','auth_cat');
    }
    
}
