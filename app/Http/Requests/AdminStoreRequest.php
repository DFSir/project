<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:adminusers|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'passwd' => 'required|regex:/^[\S]{6,8}$/'
        ];
    }

     /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        //
        return [
            'name.required' => '用户名不能为空',
            'name.regex' => '用户名格式错误',
            'name.unique' => '用户名已存在',
            'passwd.required' => '密码不能为空',
            'passwd.regex' => '密码格式错误'
        ];
    }

}
