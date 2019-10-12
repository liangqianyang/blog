<?php

namespace App\Http\Requests;


class CategoryRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'is_directory' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'is_directory' => '是否为目录'
        ];
    }
}
