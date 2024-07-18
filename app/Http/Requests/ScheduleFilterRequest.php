<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleFilterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'start_date' => 'required|date|date_format:Y-m-d',
            'due_date' => 'required|date|date_format:Y-m-d|after_or_equal:start_date',
            'user' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user' => $this->user()
        ]);
    }
}
