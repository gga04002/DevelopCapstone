<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'product_title' => ['required|max:40'],
            'product_price' => ['required|max:20'],
            'product_content' => ['required|min:10'],
        ];
    }

    public function messages() {
        return [
            'product_title' => ':atrubute은(는) 필수 입력 사항입니다.',
            'product_price' => ':atrubute은(는) 필수 입력 사항입니다.',
            'product_content' => ':atrubute은(는) 필수 입력 사항입니다.',
        ];
    }

    public function attributes() {
        return [
            'product_title' => '제품 명',
            'product_price' => '제품 가격',
            'product_content' => '제품 설명',
        ];
    }
}
