<?php

namespace App\Http\Controllers;

use App\Section;

use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index($sectionsIds = '')
    {
        $sections = Section::getEntryPointSections();
        if ($sectionsIds) {
            $array = explode('/', $sectionsIds);
            $lastId = end($array);
            //do stuff
            if (!Section::isEntryPoint($lastId))
                $sections = Section::getSection($lastId);
        }

        return view('pages.home', compact('sections'));
    }

    public function about()
    {
        return 'about';
    }
}
