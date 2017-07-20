<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class BookCopy extends Model
{
	protected $table = 'book_copies';
    protected $fillable = ['incomeNumber','clasification','barcode','copy','volume','acquisitionModality','acquisitionSource','acquisitionPrice','acquisitionDate','management','availability','printType','publicationLocation','publicationDate','book_id'];
    
    public function book(){
    	return $this->belongsto('App\Book');
    }
}