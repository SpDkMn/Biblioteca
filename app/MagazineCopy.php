<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MagazineCopy extends Model
{

	protected $fillable  = [
		//copy->ejemplar
		'clasification','incomeNumber','barcode','copy','magazine_id'
	];

	//Una copia de revista pertenece a una revista
	public function magazine(){
		return $this->belongsTo('App\Magazine');
	}

}
