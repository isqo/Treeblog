<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->delete();

        $main = Section::where('name', 'main')->first();

        Page::create(array(
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'content' => 'No content available ',
            'section_id' => $main->id,
            'is_commentable' => false
        ));

        $computer_science = Section::where('name', 'Computer Science')->first();

        Page::create(array(
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'content' => 'No content available ',
            'section_id' => $computer_science->id,
            'is_commentable' => false
        ));

        $this->command->info('The sections are created!');
    }
}
