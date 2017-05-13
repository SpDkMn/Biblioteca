<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Profiles::class);
        $this->call(Employees::class);
        $this->call(Authors::class);
        $this->call(Editorials::class);
        $this->call(Categories::class);
        $this->call(Thesiss::class);
        $this->call(ThesisCopies::class);
        $this->call(ChaptersThesis::class);
    }
}

