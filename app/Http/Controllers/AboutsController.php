<?php

namespace App\Http\Controllers;

use App\Http\Enums\NavigationEnums;

class AboutsController extends Controller
{
    public function index()
    {
        return view('abouts.index', ['nav_name' => NavigationEnums::TYPE_ABOUT]);
    }
}
