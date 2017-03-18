<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo', 'contenido', 'palabra_clave', 'urlImg', 'localizacion',
    ];
    public function setUrlImgAttribute($urlImg){
    	//echo $urlImg;
        echo("holasa");
    	if($urlImg==true)
    	{
            if(is_string ( $urlImg)==false)
            {
    		$this->attributes['urlImg'] =time().$urlImg->getClientOriginalName();
    		$name =time().$urlImg->getClientOriginalName();
    		\Storage::disk('local')->put($name,\File::get($urlImg));
            }
    	}
    }
}
