<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserUpdateRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required',
            'username' => 'sometimes|required|unique:users',
            'password' => 'sometimes|required',
            'email' => 'sometimes|required|unique:users',
            'profilePhoto' => 'sometimes',
            'coverPhoto' => 'sometimes',
            'city' => 'sometimes',
            'websites' => 'sometimes',
            'introduction' => 'sometimes',
            'company' => 'sometimes',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors(),
        ],400));
    }
}
