<?php

namespace App\Http\Controllers;

use App\Http\Enums\NavigationEnums;

class WhispersController extends Controller
{
    public function index()
    {
        return view('whispers.index', ['nav_name' => NavigationEnums::TYPE_WHISPER]);
    }
}
