<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChapterThesis extends Model
{
    protected $table = 'chaptersThesis';
    protected $fillable = ['name','number','thesis_id']; 
}
