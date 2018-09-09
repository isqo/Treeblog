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
        $page = new Page(['content' => $content]);
        if ($currentSectionId == $currentSection->name)
            $currentSection->page()->save($page);
        return view('pages.home', compact('currentSection', 'content'));
    }
}
