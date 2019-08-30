<?php

namespace App\Http\Controllers;

use App\Http\Enums\NavigationEnums;

class AlbumsController extends Controller
{
    public function index()
    {
        return view('albums.index', ['nav_name' => NavigationEnums::TYPE_ALBUM]);
    }
}
