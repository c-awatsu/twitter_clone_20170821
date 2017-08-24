<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccount extends FormRequest
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
        return ['password' => 'confirmed',
            'email' => 'email',
        ];
    }

    public function messages()
    {
        return ['password.confirmed' => 'パスワードとパスワード(確認)が一致していません',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'email.email' => 'メールアドレスを正しい書式で入力してください',
        ];
    }
}
