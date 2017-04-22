<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
	protected $table = 'book_copies';

    protected $fillable = ['incomeNumber','clasification','barcode','copy','edition','acquisitionModality','acquisitionPrice','acquisitionDate','location','management','availability','printType','publicationLocation','publicationDate','phone','ruc','book_id'];
    
    public function book(){
    	return $this->belongsto('App\Book');
    }
}
