<?php

namespace App\Http\Controllers;

use App\Section;

class MainController extends Controller
{

    public function index($sectionId = '')
    {
        $sections = Section::getEntryPointSections();
        $content = '';
        if (!Section::isEntryPoint($sectionId)) {
            $sections = Section::getSection($sectionId);
            if (!$sections->isEmpty()) {
                $upSection = $sections->first()->upSection;
                if ($upSection != null && $upSection->has_content) {
                    $content = $upSection->content->content;
                }
            }
        }

        return view('pages.home', compact('sections', 'content'));
    }

    public function about()
    {
        return 'about';
    }
}
