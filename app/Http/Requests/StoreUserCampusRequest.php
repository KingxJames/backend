<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserCampusRequest extends FormRequest
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
        return [
            'userId' => ['required'],
            'campusId' => ['required'],
            'primaryCampus' => ['required']
        
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'user_id' => $this->userId,
            'campus_id' => $this->campusId,
            'primary_campus' => $this-> primaryCampus
        ]);
    }

}
