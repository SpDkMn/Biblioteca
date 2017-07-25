<?php

use Illuminate\Database\Seeder;
use App\UserType as UserType;

class User_types extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create(['name'=>'Pregrado','prestamoSala'=>true,'prestamoDomicilio'=>true,'castigado'=>true,'tiempoDomicilio'=>180,'cantidadSala'=>3,'cantidadDomicilio'=>2]);
        UserType::create(['name'=>'Postgrado','prestamoSala'=>true,'prestamoDomicilio'=>true,'castigado'=>true,'tiempoDomicilio'=>180,'cantidadSala'=>3,'cantidadDomicilio'=>2]);
        UserType::create(['name'=>'Profesor','prestamoSala'=>true,'prestamoDomicilio'=>true,'castigado'=>true,'tiempoDomicilio'=>180,'cantidadSala'=>3,'cantidadDomicilio'=>2]);
        UserType::create(['name'=>'Externo','prestamoSala'=>true,'prestamoDomicilio'=>true,'castigado'=>true,'tiempoDomicilio'=>180,'cantidadSala'=>3,'cantidadDomicilio'=>2]);
        UserType::create(['name'=>'Administrativo','prestamoSala'=>true,'prestamoDomicilio'=>true,'castigado'=>true,'tiempoDomicilio'=>180,'cantidadSala'=>3,'cantidadDomicilio'=>2]);
        UserType::create(['name'=>'Admin','prestamoSala'=>true,'prestamoDomicilio'=>true,'castigado'=>true,'tiempoDomicilio'=>180,'cantidadSala'=>5,'cantidadDomicilio'=>2]);
}

}


        // UserType::create(['name'=>'Pregrado','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);
        // UserType::create(['name'=>'Postgrado','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);
        // UserType::create(['name'=>'Profesor','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);
        // UserType::create(['name'=>'Externo','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);
        // UserType::create(['name'=>'Administrativo','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);
        // UserType::create(['name'=>'Admin','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);