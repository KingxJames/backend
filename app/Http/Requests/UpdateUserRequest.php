<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'name' => ['required'],
                'email' => ['required'],
                'password' => ['required'],
                'workEmail' => ['required'],
                'phoneNo' => ['required'],
                'organization' => ['required'],
                'roleId' => ['required'],
                'picture' =>['required'],
                'googleIDToken' => ['required'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required'],
                'password' => ['sometimes', 'required'],
                'workEmail' => ['sometimes', 'required'],
                'phoneNo' => ['sometimes', 'required'],
                'organization' => ['sometimes', 'required'],
                'roleId' => ['sometimes', 'required'],
                'picture' => ['sometimes', 'required'],
                'googleIDToken' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'work_email' => $this->workEmail,
            'phone_no' => $this->phoneNo,
            'role_id' => $this->roleId,
            'google_id_token' => $this -> googleIDToken,
        ]);
    }
}