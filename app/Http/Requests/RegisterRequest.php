<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:doctors|email',
            'password' => 'required|min:5',
            'phone' => 'required|max:10',
            'profile_image' => 'required|image|max:2048',
            'certificate_image' => 'required|image|max:2048',
        ];
    }
}
