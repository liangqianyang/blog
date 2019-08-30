<?php

namespace App\Http\Controllers;

use App\Http\Enums\NavigationEnums;

class LeacotsController extends Controller
{
    public function index()
    {
        return view('leacots.index', ['nav_name' => NavigationEnums::TYPE_LEACOTS]);
    }
}
