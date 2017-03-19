<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model{
	protected $table = 'editorials';

	protected $fillable=['name'];

    public function categories(){
    	return $this->belongsToMany('\App\Category','edi_cat');
    }

		public function scopeName($query,$name){
			if(trim($name)!=""){
				$query->where('name',"LIKE","%$name%");
			}
		}

}
