<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserType extends Model
{
    use SoftDeletes;
    protected $table = 'user_types';

	   protected $fillable = ['name','JSON',];

    protected $dates = ['deleted_at'];

    public function Users(){
    	return $this->hasMany('App\User');
    }
}
