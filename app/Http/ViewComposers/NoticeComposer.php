<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/11/20
 * Time: 15:00
 */

namespace App\Http\ViewComposers;

use App\Models\Notice;
use Illuminate\View\View;

class NoticeComposer
{

    private $notice;

    public function __construct(Notice $notice)
    {
        $this->notice = $notice;
    }

    public function compose(View $view)
    {
        $view->with('notices', $this->notice->orderBy('is_top', 'desc')->limit(4)->get());
    }
}
