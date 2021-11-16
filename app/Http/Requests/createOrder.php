<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createOrder extends FormRequest
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
            'firstName' => 'required|min:2|string|max:255',
            'lastName' => 'required|min:2|string|max:255',
            'phone' => 'required|string|min:9|max:13',
            'regions' => 'required|string',
            'cities' => 'required|string',
            'department' => 'required|string',
            'comment' => '',
        ];
    }
}
