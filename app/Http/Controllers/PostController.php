<?php

namespace App\Http\Controllers;

use App\Page;
use App\Section;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function Create(Request $request, $currentSectionId = 'main')
    {

        $this->validate(request(), [
            "content" => "required",
        ]);

        $content = $request->input('content');
        $currentSection = Section::getSection($currentSectionId);
        $contentToSave = ['content' => $content];
        if ($currentSection->page === null) {
            $pageToSave = new Page($contentToSave);
            $currentSection->page()->save($pageToSave);
        } else {
            $currentSection->page->update($contentToSave);
        }
        return view('pages.home', compact('currentSection', 'content'));
    }
}
