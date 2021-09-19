<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => ['required'],
            'detail' => ['required'],
            'due_date' => ['required','date_format:Y-m-d','after_or_equal:date'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'ต้องการข้อมูลในช่องนี้',
            'due_date.after_or_equal' => 'ต้องเลือกวันตั้งแต่วันปัจจุบันเป็นต้นไป'
        ];
    }
}
