<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSignRequest extends FormRequest
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
     *  hdphp
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'content' => ['required', 'between:5,100'],
            'mood' => ['required'],
        ];
    }
}
