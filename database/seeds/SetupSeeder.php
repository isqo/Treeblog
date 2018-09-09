<?php

use Illuminate\Database\Seeder;
use App\Setup;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setup::create(array());
    }
}
