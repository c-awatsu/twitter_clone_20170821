<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
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
        return ['body' => ['required','string','max:140',]];
    }

    public function messages()
    {
        return ['body.required' => '空のツイートを行うことはできません',
                'body.string' => '文字列を使用してください',
               'body.max' => 'ツイートは140字以内で行ってください'];
    }
}
