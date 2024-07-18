<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ScheduleTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(Request $request): array
    {
        $rules = [];

        if (in_array($request->method(), ['POST', 'PUT'])) {
            $rules = [
                'uuid' => 'uuid',
                'description' => [
                    'nullable',
                    'string',
                ],
            ];
        }

        return $rules;
    }
}
