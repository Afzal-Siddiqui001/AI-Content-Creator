<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequestForm extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($this->id)],
            'phone' => ['required'],
            'password' => ['required'],
            'package' => ['required'],
            'paid_amount' => ['sometimes', 'nullable', 'numeric'],
            'payment_method' => ['sometimes', 'nullable'],
        ];
    }
}
