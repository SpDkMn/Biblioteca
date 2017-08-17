<?php

use Illuminate\Database\Seeder;
use App\UserType as UserType;

class UserTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
      UserType::create([
         'name' => 'Pregrado',
         'prestamoSala' => true,
         'prestamoDomicilio' => true,
         'castigado' => true,
         'tiempoDomicilio' => 180,
         'cantidadSala' => 3,
         'cantidadDomicilio' => 2
      ]);
      UserType::create([
         'name' => 'Postgrado',
         'prestamoSala' => true,
         'prestamoDomicilio' => true,
         'castigado' => true,
         'tiempoDomicilio' => 180,
         'cantidadSala' => 3,
         'cantidadDomicilio' => 2
      ]);
      UserType::create([
         'name' => 'Docente',
         'prestamoSala' => true,
         'prestamoDomicilio' => true,
         'castigado' => true,
         'tiempoDomicilio' => 180,
         'cantidadSala' => 3,
         'cantidadDomicilio' => 2
      ]);
      UserType::create([
         'name' => 'Externo',
         'prestamoSala' => true,
         'prestamoDomicilio' => true,
         'castigado' => true,
         'tiempoDomicilio' => 180,
         'cantidadSala' => 3,
         'cantidadDomicilio' => 2
      ]);
      UserType::create([
         'name' => 'Administrativo',
         'prestamoSala' => true,
         'prestamoDomicilio' => true,
         'castigado' => true,
         'tiempoDomicilio' => 180,
         'cantidadSala' => 3,
         'cantidadDomicilio' => 2
      ]);
      UserType::create([
         'name' => 'Admin',
         'prestamoSala' => true,
         'prestamoDomicilio' => true,
         'castigado' => true,
         'tiempoDomicilio' => 180,
         'cantidadSala' => 5,
         'cantidadDomicilio' => 2
      ]);



    }
}
