<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchItem extends Model
{
  protected $fillable = [
     'item_id',
     'type',
     'content',
     'state'
  ];
}
