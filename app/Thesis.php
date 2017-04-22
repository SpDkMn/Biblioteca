<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{	

	protected $table = 'theses';

    protected $fillable = ['title','summary','category_id','editorial_id'];

    public function authors(){
    	return $this->belongsToMany('App\Author','auth_thesis')->withPivot('type');
    }

    public function chapters(){
        return $this->hasMany('App\ChapterThesis');
    }
}
