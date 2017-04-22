<?php

use Illuminate\Database\Seeder;

use App\Category as Category; 

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Rellenando la tabla categorias para hacer la prueba
		Category::create(['name'=>'libro']);
		Category::create(['name'=>'revista']);
		Category::create(['name'=>'tesis']);
		Category::create(['name'=>'compendio']);
		Category::create(['name'=>'colaborador']);
		Category::create(['name'=>'asesor']);
    }
}
