<?php


namespace App\Http\ViewComposers;

use App\Models\AdminUser;
use Illuminate\View\View;

class CardComposer
{

    public function compose(View $view)
    {
        $info = AdminUser::query()->select(['phone','real_name','email','avatar','cn_name','en_name','nickname','address','profession','summary','description'])->find(1);
        $view->with('info', $info);
    }
}
