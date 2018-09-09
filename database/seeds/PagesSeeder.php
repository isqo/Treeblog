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

        $java = Section::where('name', 'Primitives2')->first();

        Page::create(array(
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'content' => 'one two tree four five six seven eight nine ten',
            'section_id' => $java->id,
            'is_commentable' => false
        ));

        $this->command->info('The sections are created!');
    }
}
