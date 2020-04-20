<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequest extends FormRequest
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
            'question_title' => ['required|max:100'],
            'question_content' => ['required|min:10'],
        ];
    }

    public function messages() {
        return [
            'question_title' => ':atrubute은(는) 필수 입력 사항입니다.',
            'question_content' => ':atrubute은(는) 필수 입력 사항입니다.',
        ];
    }

    public function attributes() {
        return [
            'question_title' => '질문 제목',
            'question_content' => '질문 내용',
        ];
    }
}
