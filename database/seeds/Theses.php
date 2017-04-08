<?php

use Illuminate\Database\Seeder;
use App\Thesis as Thesis ;
class Theses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Thesis::create(['title'=>'Sistemas digitales ','summary'=>'Huellas dactilares','category_id'=>3,'editorial_id'=>5]);
          Thesis::create(['title'=>'Ralidad Virtual','summary'=>'Aplicaciones en la medicina','category_id'=>3,'editorial_id'=>8]);
          Thesis::create(['title'=>'Inteligencia Artificial','summary'=>'Cambiando el universo','category_id'=>9,'editorial_id'=>7]);
          Thesis::create(['title'=>'Aprendiendo a leer','summary'=>'Letras y palabras','category_id'=>9,'editorial_id'=>4]);
          Thesis::create(['title'=>'Pinocho','summary'=>'Gepeto y su hijo de madera','category_id'=>3,'editorial_id'=>5]);
          Thesis::create(['title'=>'Las ventajas de ser invisible','summary'=>'Libro que lei','category_id'=>9,'editorial_id'=>5]);
          Thesis::create(['title'=>'Titanic','summary'=>'El barco hundido','category_id'=>9,'editorial_id'=>5]);
          Thesis::create(['title'=>'Topicos de Calculo','summary'=>'Demostraciones y derivadas','category_id'=>9,'editorial_id'=>4]);
          Thesis::create(['title'=>'El diario de Greg','summary'=>'Las regla¡s de Rodrick','category_id'=>3,'editorial_id'=>3]);
          Thesis::create(['title'=>'Madame Bobari','summary'=>'Literatura desconocida','category_id'=>9,'editorial_id'=>2]);
          Thesis::create(['title'=>'Narraciones Extraordinarias','summary'=>'Edgar Alam Poe','category_id'=>3,'editorial_id'=>1]);
          Thesis::create(['title'=>'Doña Barbara','summary'=>'La mejor novela','category_id'=>3,'editorial_id'=>5]);
          Thesis::create(['title'=>'El mundo es Ancho y Ajeno','summary'=>'La tortura del campesino','category_id'=>3,'editorial_id'=>1]);
          Thesis::create(['title'=>'Trilce','summary'=>'Poesia del bueno','category_id'=>3,'editorial_id'=>5]);
    }
}
