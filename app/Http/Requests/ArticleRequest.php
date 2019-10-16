<?php

namespace App\Http\Requests;


class ArticleRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cid' => 'required',
            'label_ids' => 'required',
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'cid' => '文章分类',
            'label_ids' => '文章标签',
            'title' => '文章标题',
            'content' => '文章内容'
        ];
    }
}
