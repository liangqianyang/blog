<?php

namespace App\Http\Controllers;

use App\Http\Enums\NavigationEnums;

class IndexController extends Controller
{
    public function root()
    {
        return view('pages.root', ['nav_name' => NavigationEnums::TYPE_ARTICLE]);
    }
}
