<?php

use App\Content;
use App\Section;
use Illuminate\Database\Seeder;

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
            'is_entry_point' => true,
            'section_id' => $computer_science->id
        ));

        $java = Section::create(array(
            'name' => 'Primitives',
            'description' => '...',
            'has_content' => true,
            'is_entry_point' => false,
            'section_id' => $java->id,
            'tag' => "#test"
        ));

        Content::create(array(
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'title' => 'Java Programming',
            'content' => 'one two tree four five six seven eight nine ten',
            'section_id' => $java->id,
            'is_commentable' => false
        ));

        $this->command->info('The sections are created!');
    }
}
