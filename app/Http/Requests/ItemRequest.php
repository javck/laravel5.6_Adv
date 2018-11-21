<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Log;

class ItemRequest extends FormRequest
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
        Log::debug('rules');
        return [
            'name' => 'required|unique:items|max:255',
            'price' => 'required',
            'publish_at' => 'nullable|date',
        ];
    }

    public function withValidator($validator)
    {
        Log::debug('withValidator');
        $validator->after(function ($validator) {
            // if ($this->somethingElseIsInvalid()) {
            //     $validator->errors()->add('field', 'Something is wrong with this field!');
            // }
        });
    }

    public function messages()
    {
        return [
            'name.required' => '商品名稱必須要提供',
            'price.required' => '價格必須要提供',
        ];
    }
}
