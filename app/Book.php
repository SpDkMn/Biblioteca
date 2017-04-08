<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{   
    protected $table = 'books';

	protected $fillable = ['title','secondaryTitle','summary','isbn','extension','physicalDetails','dimensions','accompaniment'];

    public function bookCopies(){
    	return $this->hasMany('App\BookCopy');
    }

    public function editorials(){
    	return $this->belongsToMany('App\Editorial','editorial_book')->withPivot('type');
    }
    
    public function authors(){
    	return $this->belongsToMany('App\Author','author_book')->withPivot('type');
    }
    public function chapters(){
        return $this->hasMany('App\ChapterBook');
    }
}
 