<?php

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

        $main = Section::create(array(
            'name' => 'main',
            'horizontal_position' => 0,
            'vertical_position' => Section::count() + 1
        ));

        $computer_science = Section::create(array(
            'name' => 'Computer Science',
            'section_id' => $main->id,
            'horizontal_position' => 1,
            'vertical_position' => Section::count() + 1
        ));

        $java = Section::create(array(
            'name' => 'Java Programming',
            'section_id' => $computer_science->id,
            'horizontal_position' => 2,
            'vertical_position' => Section::count() + 1
        ));

        $primitives = Section::create(array(
            'name' => 'Primitives',
            'section_id' => $java->id,
            'horizontal_position' => 1,
            'vertical_position' => Section::count() + 1
        ));

        $int = Section::create(array(
            'name' => 'int',
            'section_id' => $primitives->id,
            'horizontal_position' => 2,
            'vertical_position' => Section::count() + 1
        ));

        $t1 = Section::create(array(
            'name' => 't1',
            'section_id' => $int->id,
            'horizontal_position' => 1,
            'vertical_position' => Section::count() + 1
        ));

        Section::create(array(
            'name' => 't2',
            'section_id' => $t1->id,
            'horizontal_position' => 2,
            'vertical_position' => Section::count() + 1
        ));

        Section::create(array(
            'name' => 'Primitives2',
            'section_id' => $java->id,
            'horizontal_position' => 1,
            'hasContent' => true,
            'vertical_position' => Section::count() + 1
        ));


        $this->command->info('The sections are created!');
    }
}
