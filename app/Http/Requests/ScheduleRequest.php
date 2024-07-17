<?php

namespace App\Http\Requests;

use App\Enums\StatusScheduleEnum;
use App\Rules\NotWeekend;
use App\Rules\ScheduleDateOverLap;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ScheduleRequest extends FormRequest
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
                'type' => [
                    'required'
                ],
                'title' => [
                    'required',
                    'string',
                    'max:255'
                ],
                'type' => [
                    'required',
                    'string',
                    'max:255'
                ],
                'description' => [
                    'nullable',
                    'string',
                ],
                'start_date' => [
                    'required',
                    'date_format:Y-m-d H:i:s',
                    'before_or_equal:due_date',
                    new NotWeekend,
                    new ScheduleDateOverLap($request->user(), $request->start_date, $request->due_date),
                ],
                'due_date' => [
                    'required',
                    'date_format:Y-m-d H:i:s',
                    'after_or_equal:start_date',
                    new NotWeekend
                ],
                'status' => [
                    'required',
                    'string',
                    Rule::in(StatusScheduleEnum::getAll())
                ],
                'user.id' => [
                    'required',
                    'exists:users,id'
                ]
            ];
        }

        return $rules;
    }
}
