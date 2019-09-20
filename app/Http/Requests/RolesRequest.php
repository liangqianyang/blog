<?php

namespace App\Http\Requests;


class RolesRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:admin_roles',
            'rule_ids' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '角色名称',
            'rule_ids' => '权限',
        ];
    }
}
