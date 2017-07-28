<?php
use Illuminate\Database\Seeder;
use App\UserType as UserType;

define('NAME', 'name');
define('PRESTAMOSALA', 'prestamoSala');
define('PRESTAMODOMICILIO', 'prestamoDomicilio');
define('CASTIGADO', 'castigado');
define('TIEMPODOMICILIO', 'tiempoDomicilio');
define('CANTIDADSALA', 'cantidadSala');
define('CANTIDADDOMICILIO', 'cantidadDomicilio');

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
         NAME => 'Pregrado',
         PRESTAMOSALA => true,
         PRESTAMODOMICILIO => true,
         CASTIGADO => true,
         TIEMPODOMICILIO => 180,
         CANTIDADSALA => 3,
         CANTIDADDOMICILIO => 2
      ], [
         NAME => 'Postgrado',
         PRESTAMOSALA => true,
         PRESTAMODOMICILIO => true,
         CASTIGADO => true,
         TIEMPODOMICILIO => 180,
         CANTIDADSALA => 3,
         CANTIDADDOMICILIO => 2
      ], [
         NAME => 'Profesor',
         PRESTAMOSALA => true,
         PRESTAMODOMICILIO => true,
         CASTIGADO => true,
         TIEMPODOMICILIO => 180,
         CANTIDADSALA => 3,
         CANTIDADDOMICILIO => 2
      ], [
         NAME => 'Externo',
         PRESTAMOSALA => true,
         PRESTAMODOMICILIO => true,
         CASTIGADO => true,
         TIEMPODOMICILIO => 180,
         CANTIDADSALA => 3,
         CANTIDADDOMICILIO => 2
      ], [
         NAME => 'Administrativo',
         PRESTAMOSALA => true,
         PRESTAMODOMICILIO => true,
         CASTIGADO => true,
         TIEMPODOMICILIO => 180,
         CANTIDADSALA => 3,
         CANTIDADDOMICILIO => 2
      ], [
         NAME => 'Admin',
         PRESTAMOSALA => true,
         PRESTAMODOMICILIO => true,
         CASTIGADO => true,
         TIEMPODOMICILIO => 180,
         CANTIDADSALA => 5,
         CANTIDADDOMICILIO => 2
      ]);
   }
}


        // UserType::create(['name'=>'Pregrado','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);
        // UserType::create(['name'=>'Postgrado','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);
        // UserType::create(['name'=>'Profesor','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);
        // UserType::create(['name'=>'Externo','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);
        // UserType::create(['name'=>'Administrativo','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);
        // UserType::create(['name'=>'Admin','prestamoSala'=>false,'prestamoDomicilio'=>false,'castigado'=>false,'tiempoDomicilio'=>null,'cantidadSala'=>null,'cantidadDomicilio'=>null]);