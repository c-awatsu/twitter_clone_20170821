<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateAccountRequest extends FormRequest
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
        return ['password' => ['nullable', 'string', 'alpha_num', 'min:8', 'confirmed',],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users','email') -> ignore(Auth::user() -> id), ],
            'url_name' => ['required', 'string', 'alpha_num', 'max:15', Rule::unique('users','url_name') -> ignore(Auth::user() -> id),],
        ];
    }

    public function messages()
    {
        return ['password.confirmed' => 'パスワードとパスワード(確認)が一致していません',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.string' => 'パスワードにはアルファベットと数字を使用してください',
            'password.alpha_num' => 'パスワードにはアルファベットと数字を使用してください',
            'email.email' => 'メールアドレスを正しい書式で入力してください',
            'email.unique' => '既に登録されているメールアドレスを使用することはできません',
            'email.max' => 'メールアドレスは255文字以下のものを使用してください',
            'email.required' => 'メールアドレスを空にすることはできません',
            'url_name.required' => 'ユーザー名を空にすることはできません',
            'url_name.string' => 'ユーザー名にはアルファベットと数字を使用してください',
            'url_name.alpha_num' => 'ユーザー名にはアルファベットと数字を使用してください',
            'url_name.max' => 'ユーザー名は15文字以下にしてください',
            'url_name.unique' => "そのユーザー名は他のユーザーに既に使用されています",

        ];
    }
}
