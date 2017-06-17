<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThesisCopy extends Model
{
	protected $table = 'thesis_copies';

    protected $fillable = ['incomeNumber','barcode','ejemplar','availability','thesis_id'];
    
    public function thesis(){
    	return $this->belongsto('App\Thesis');
    }
}
