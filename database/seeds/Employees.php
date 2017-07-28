<?php
use Illuminate\Database\Seeder;

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
         'id_user_type' => 1,
         'state' => true
      ], [
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
         'id_user_type' => 3,
         'state' => true
      ]);
      
      Employee::create([
         'user_id' => 1,
         'profile_id' => 1
      ], [
         'user_id' => 2,
         'profile_id' => 2
      ]);
   }
}
