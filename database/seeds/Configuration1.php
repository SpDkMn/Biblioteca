<?php
use Illuminate\Database\Seeder;
use App\Configuration as Configuration;
class Configuration1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::create(['name' => 'Activar','JSON'=>'{"activar":1}']);
    }
}
