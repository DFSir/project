<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersStoreRequest extends Request
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
        // 用户验证
        return [
            'uname' => 'required|unique:homeusers|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'uaccnum' => 'required|unique:homeusers|regex:/^[\d]{6,8}$/',
            'upasswd' => 'required|regex:/^[\w]{6,8}$/'
        ];
    }


    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'uname.required' => '用户名不能为空',
            'uname.regex' => '用户名格式错误',
            'uname.unique' => '用户名已存在',
            'uaccnum.required' => '账号不能为空',
            'uaccnum.regex' => '账号格式错误',
            'uaccnum.unique' => '账号已存在',
            'upasswd.required' => '密码不能为空',
            'upasswd.regex' => '密码格式错误'
        ];
    }

   

}
