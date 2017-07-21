<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Editorial extends Model{
	protected $table = 'editorials';
	protected $fillable=['name'];
	//Una editorial pertenece a muchas revistas
	public function magazines(){
		return $this->belongsToMany('App\Magazine','editorial_magazine')->withPivot('type');
	}

	public function compendium(){
		return $this->hasMany('App\Compendium');
	}
	public function books(){
		return $this->belongsToMany('App\Book','editorial_book')->withPivot('type');
	}
    public function categories(){
    	return $this->belongsToMany('App\Category','category_editorial');
    }
     public function scopeName($query,$name){
		if(trim($name)!=""){
			return $query->where('name',"LIKE","%$name%");
		}
    }
}