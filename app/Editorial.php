<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{

	protected $fillable = [
		'name'
	];


    //Una editorial pertenece a muchas revistas
	public function magazines(){
		return $this->belongsToMany('App\Magazine','editorial_magazine');
	}

	//Una editorial puede pertenece a muchas categorias
	public function categories(){
		return $this->belongsToMany('App\Category','category_editorial');
	}

}
