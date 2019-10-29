<?php

namespace App\Http\Controllers;

use App\Http\Enums\NavigationEnums;
use App\Models\Banner;

class IndexController extends Controller
{
    public function root()
    {
        $banners = Banner::query()->orderBy('sort', 'asc')->get();
        return view('index.index', ['is_root' => 1,'banners'=>$banners]);
    }

    public function info()
    {
        return view('index.info');
    }

    public function list()
    {
        return view('index.list');
    }

    public function list2()
    {
        return view('index.list2');
    }

    public function list3()
    {
        return view('index.list3');
    }

    public function time()
    {
        return view('index.time');
    }

    public function about()
    {
        return view('index.about');
    }

    public function daohang()
    {
        return view('index.daohang');
    }

    public function message()
    {
        return view('index.message');
    }
}
