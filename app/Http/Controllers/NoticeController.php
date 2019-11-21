<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/11/20
 * Time: 15:13
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{

    public function show(Request $request, Notice $notice)
    {
        $list = Notice::query()->orderBy('is_top', 'desc')->get();
        return view('notice.info', ['info' => $notice, 'notices' => $list]);
    }
}
