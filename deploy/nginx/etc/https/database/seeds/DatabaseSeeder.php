<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('SectionsSeeder');
        $this->call('PagesSeeder');
        $this->command->info('sections seeds finished.');
    }
}
