<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentMemberRequest extends FormRequest
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
        $method = $this -> method();
        if($method == 'PUT') {
            return [
                'departmentId' =>['required'],
                'userId' => ['required'],
            ];
        }
        else {
            return [
                'departmentId' =>['sometimes','required'],
                'userId' => ['sometimes','required'],
            ];
        }
    }

    protected function prepareForValidation() {
        $this->merge([
            'department_id'=>$this->departmentId,
            'user_id'=>$this->userId 
        ]);
    }
}
