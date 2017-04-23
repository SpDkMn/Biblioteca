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
        User::create(['name'=>'Admin','last_name'=>'Admin','email'=>'admin@admin.com','password'=>bcrypt('admin')]);
        User::create(['name'=>'Trabajador2','last_name'=>'trabajador2','email'=>'trabajador2@trabajador.com','password'=>bcrypt('trabajador2')]);

        Employee::create(['user_id'=>1, 'profile_id' => 1]);
        Employee::create(['user_id'=>1, 'profile_id' => 2]);
    }
}
