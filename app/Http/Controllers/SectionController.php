<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function create(Request $request)
    {
        $this->validate(request(), [
            'section_name_for_creation' => 'required|unique:sections,name|max:100',
            'section_type' => 'required',
            'section_parent' => 'required|exists:sections,name',
            'horizontal_position' => 'required|Numeric',
        ]);

        $section_name = $request->input('section_name_for_creation');
        $sectionType = $request->input('section_type');
        $horizontal_position = $request->input('horizontal_position');

        $section = Section::getSection(request(['section_parent']));
        $section->addNewChild(new Section([
            'name' => $section_name,
            'hascontent' => $sectionType === "Content" ? true : false,
            'section_id' => $section->id,
            'horizontal_position' => $horizontal_position,
            'vertical_position' => Section::count() + 1
        ]));

        return back();
    }


    public function delete(Request $request)
    {
        $this->validate(request(), [
            'section_name_for_deletion' => 'required|exists:sections,name',
        ]);

        $section = Section::getSection(request(['section_name_for_deletion']));
        $section->delete();
        return back();
    }


    public function move(Request $request)
    {
        $this->validate(request(), [
            'section_name_for_moving' => 'required|exists:sections,name',
            'direction' => 'required|Numeric',
        ]);

        $direction = $request->input('direction');
        $section = Section::getSection(request(['section_name_for_moving']));

        if ($direction == 1) {
            $section->moveUp();
        } else {
            $section->moveDown();
        }
        return back();
    }


}
