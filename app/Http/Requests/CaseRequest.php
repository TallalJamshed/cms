<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaseRequest extends FormRequest
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
        $rules =  [
            'case_title' => 'required',
            'case_nature' => 'required',
            'court_name' => 'required',
            'reference' => 'present',
            'previous_date' => 'nullable|date',
            'next_date' => 'required|date|after:previous_date',
            'case_status' => 'required',
            'fk_client_id' => 'required|exists:client,client_id',
            'amount' => 'nullable|numeric'
        ];

        return $rules;
    }

    public function messages(){
        return [
            'case_title.required' => 'Case Title is required',
            'case_nature.required' => 'Case Nature is required',
            'court_name.required' => 'Court Name is required',
            'reference.present' => 'Reference should be present',
            'previous_date.date' => 'Previous date should be in mm/dd/yyyy formate',
            'next_date.date' => 'Next date should be in mm/dd/yyyy formate',
            'next_date.after' => 'Next date should be greater then previous date',
            'case_status.required' => 'Case Status is required',
            'fk_client_id.required' => 'Client name is required',
            'fk_client_id.exists' => 'This Client ID does not exist',
            'amount.numeric' => 'Case Fee should be a number'
        ];
    }
}
