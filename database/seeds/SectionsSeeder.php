<?php

use Illuminate\Database\Seeder;
use App\Section;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();


        $computer_science = Section::create(array(
            'name' => 'Computer Science',
            'description' => '...',
            'has_content' => false,
            'is_entry_point' => true
        ));

        $java = Section::create(array(
            'name' => 'Java Programming',
            'description' => '...',
            'has_content' => false,
            'is_entry_point' => false,
            'section_id'=> $computer_science->id
        ));

        $this->command->info('The sections are created!');
    }
}
