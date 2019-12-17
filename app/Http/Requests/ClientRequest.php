<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'client_name' => 'required',
            'email' => 'present|email|unique:client,email',
            'phone_number' => 'required|numeric',
        ];
    }

    public function messages(){
        return [
            'client_name.required' => 'Client name is required',
            'email.email' => 'Please enter correct email',
            'email.unique' => 'This email is already in use',
            'phone_number.required' => 'Phone number is required',
            'phone_number.numeric' => 'Please enter only numbers',
        ];
    }
}
