<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThesisCopy extends Model
{
	protected $table = 'thesis_copies';
	
    protected $fillable = ['incomeNumber','clasification','barcode','copy','edition','acquisitionModality','acquisitionPrice','acquisitionDate','location','management','availability','printType','publicationLocation','publicationDate','phone','ruc','thesis_id'];

    public function thesis(){
    	return $this->belongsto('App\Thesis');
    }
}
