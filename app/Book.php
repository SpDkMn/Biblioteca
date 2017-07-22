<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{   
    use SoftDeletes;
    protected $table = 'books';

	protected $fillable = ['clasification','title','secondaryTitle','summary','isbn','extension','physicalDetails','dimensions','accompaniment','relationBook','edition','libraryLocation'];

    protected $dates = ['deleted_at'];

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
    public function themes(){
        return $this->belongsToMany('App\Theme','book_theme');
    }
}
 