<?php

namespace App\Http\Controllers;

use App\Page;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SectionController extends Controller
{
    public function create(Request $request)
    {
        $this->validate(request(), [
            'section_name_for_creation' => 'required|unique:sections,name|max:100',
            'section_type' => 'required',
            'content_title' => 'required_if:section_type,==,Content|max:200',
            'section_parent' => 'required|exists:sections,name',
            'horizontal_position' => 'required|Numeric',
        ]);

        $section_name = $request->input('section_name_for_creation');
        $sectionType = $request->input('section_type');
        $horizontal_position = $request->input('horizontal_position');
        $hasContent = $sectionType === "Content" ? true : false;
        $content_title = $request->input('content_title');

        $section = Section::getSection(request(['section_parent']));
        $newSection = $section->addNewChild(new Section([
            'name' => $section_name,
            'hascontent' => $hasContent,
            'section_id' => $section->id,
            'horizontal_position' => $horizontal_position,
            'vertical_position' => Section::count() + 1
        ]));

        if ($newSection && $hasContent) {
            $contentToSave = ['content' => '', 'title' => $content_title];
            $pageToSave = new Page($contentToSave);
            $newSection->page()->save($pageToSave);
        }
        if ($hasContent) {
            return redirect()->route('main', ['sections' => $newSection->name]);
        }
        return back();
    }

    public function update(Request $request)
    {
        //Rule::unique('sections')->ignore($user->id),
        $this->validate(request(), [
            'section_name' => 'bail|required',
            'new_section_name' => ['required', Rule::unique('sections', 'name')->ignore($request->input('section_name'), 'name'), 'max:100'],
        ]);

        $new_section_name = $request->input('new_section_name');
        $section_name = $request->input('section_name');
        $content_title = $request->input('content_title');

        $section = Section::getSection($section_name);
        $section->name = $new_section_name;

        if ($content_title && $section->hasContent) {
            $section->page->title = $content_title;
        }

        $section->push();

        if ($section->hasContent) {
            return redirect()->route('main', ['sections' => $section_name]);
        }
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
