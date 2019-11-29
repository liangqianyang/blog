<?php


namespace App\Http\ViewComposers;


use App\Models\Label;
use Illuminate\View\View;

class TagsComposers
{
    private $label;

    public function __construct(Label $label)
    {
        $this->label = $label;
    }

    public function compose(View $view)
    {
        $tags = $this->label->select(['id','title'])->get();
        $view->with('tags', $tags);
    }

}
