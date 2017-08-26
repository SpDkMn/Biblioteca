<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

use App\User as User;
use App\Employee as Employee;

class Employees extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {

      User::create([
         'username' => 'admin@admin.com',
         'password' => bcrypt('admin'),
         'name' => 'Giordano de Jesus',
         'last_name' => 'Admin admin',
         'code' => "16200251",
         'dni' => '71324372',
         'home_phone' => '5373623',
         'phone' => '12345678',
         'email' => 'admin@admin.com',
         'address' => "av.tupac amaru",
         'school' => 'Ingenieria de Software',
         'faculty' => "ingenieria de sistemas e informatica",
         'university' => "Universidad nacional mayor de san marcos",
         'id_user_type' => 5,
         'state' => true,
         'register'=>false
      ]);

      User::create([
         'username' => 'superadmin',
         'password' => bcrypt('jefa'),
         'name' => 'Maribel',
         'last_name' => 'Espinoza',
         'code' => "732602349",
         'dni' => '71324372',
         'home_phone' => '990373623',
         'phone' => '12345678',
         'email' => 'superadmin@admin.com',
         'address' => "av.Los girasoles",
         'school' => 'Ingenieria de Sistemas',
         'faculty' => "ingenieria de sistemas e informatica",
         'university' => "Universidad nacional mayor de san marcos",
         'id_user_type' => 5,
         'state' => true,
         'register'=>false

        //  'register'=>true
      ]);

      Employee::create([
         'code' => 'empleado_1a45',
         'password' => Crypt::encrypt('admin'),
         'user_id' => 1,
         'profile_id' => 1
      ]);
      Employee::create([
         'code' => 'empleado_21a5',
         'password' => Crypt::encrypt('admin2'),
         'user_id' => 2,
         'profile_id' => 2
      ]);

   }
}
