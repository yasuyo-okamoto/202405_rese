<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email|string|max:191',
            'password' => 'required|string|min:8|max:191',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '※ユーザーネームを入力してください',
            'username.string' => '※ユーザーネームは文字列で入力してください。',
            'username.max' => '※ユーザーネームは191文字以内で入力してください。',
            'username.unique' => '※このユーザーネームは既に使用されています',
            'email.required' => '※メールアドレスを入力してください',
            'email.unique' => '※このメールアドレスは既に使用されています',
            'email.string' => '※メールアドレスは文字列で入力してください。',
            'email.max' => '※メールアドレスは191文字以内で入力してください。',
            'password.required' => '※パスワードを入力してください',
            'password.string' => '※パスワードは文字列で入力してください。',
            'password.min:8' => '※パスワードは8文字以上で入力してください',
            'password.max' => '※パスワードは191文字以内で入力してください。'
        ];
    }
}
