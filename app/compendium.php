<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Compendium extends Model
{
  //Datos guardados en la tabla
    use SoftDeletes;
    protected $fillable = [
        'title','author_id','numero','fechaEdicion','introduccion','editorial_id'
    ];
    protected $dates = ['deleted_at'];
    //Un compendio tiene una o más copias
  public function compendium_copies(){
    return $this->hasMany('App\CompendiumCopy');
  }
    //Un compendio pertenece una o más editoriales
    public function editorials(){
        return $this->belongsTo('App\Editorial');
    }
    //Un compendio pertenece a una entidad academica (Autor)
    public function author(){
        return $this->belongsTo('App\Author');
    }
    //Un compendio tiene uno o más contenidos
    public function contents(){
        return $this->hasMany('App\Content');
    }
}