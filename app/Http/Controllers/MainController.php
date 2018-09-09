<?php

namespace App\Http\Controllers;

use App\Section;
use App\SectionLogic;
use App\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{

    public function index(Request $request, $currentSectionId = 'main')
    {
        $content = null;
        $currentSection = Section::getSection($currentSectionId);

        $page = $currentSection->page;
        if ($page)
            $content = $page->content;

        return view('pages.home', compact('currentSection', 'content'));
    }


    public function about()
    {
        return 'about';
    }
}
