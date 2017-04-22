<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChapterBook extends Model
{
    protected $table = 'chapters_book';
    protected $fillable = ['name','number','book_id']; 
}
