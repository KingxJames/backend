<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentMemberRequest extends FormRequest
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
            'departmentId' =>['required'],
            'userId' => ['required'],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'department_id'=>$this->departmentId,
            'user_id'=>$this->userId 
        ]);
    }
};