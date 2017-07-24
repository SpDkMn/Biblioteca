<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Holiday extends Model
{
    use SoftDeletes;
	protected $table = 'holidays';

    protected $fillable = ['item','start','end','id_configuration'];
    	
    protected $dates = ['deleted_at'];

    public function configuration(){
    	return $this->belongsto('App\Configuration');
    }
}
