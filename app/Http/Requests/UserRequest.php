<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{
    protected $typeRule;

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
                'name' => [
                    'required',
                    'min:3',
                    'max:255'
                ],
                'password' => [
                    'required_if:' . $request->method() == 'POST',
                    'min:8'
                ],
                'email' => [
                    'required',
                    'email:rfc,dns',
                ]
            ];
            $ruleUniqueEmail = $request->method() == 'POST' ? 'unique:users' : 'unique:users,email,' . $this->route('user') . ',id';
            $rules['email'][] = $ruleUniqueEmail;
        }

        return $rules;
    }
}
