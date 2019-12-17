<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCaseRequest extends FormRequest
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
            'case_title' => 'required',
            'case_nature' => 'required',
            'court_name' => 'required',
            'reference' => 'present',
            'previous_date' => 'nullable|date',
            'next_date' => 'required|date|after:prev_date',
            // 'next_date' => 'after_or_equal:next',
            // 'next_date' => 'required|date',
            'case_status' => 'required',
            'amount' => 'required|numeric'
        ];
    }

    public function messages(){
        return [
            'case_title.required' => 'Case Title is required',
            'case_nature.required' => 'Case Nature is required',
            'court_name.required' => 'Court Name is required',
            'reference.present' => 'Reference should be present',
            'reference.present' => 'Reference should be present',
            'previous_date.date' => 'Next date should be in mm/dd/yyyy formate',
            'next_date.after' => 'Next date should be greater then previous date',
            // 'next_date.after_or_equal' => 'Next date can not be less then current date',
            'case_status.required' => 'Case Status is required',
            'amount.required' => 'Case Fee is required',
            'amount.numeric' => 'Case Fee should be a number',
        ];
    }
}
