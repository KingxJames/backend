<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccessRightRequest extends FormRequest
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
                    'description'=>['required'],
                    'roleId'=>['required'],
                ];
            }
            else {
                return [
                    'description'=>['sometimes','required'],
                    'roleId'=>['sometimes','required'],
                ];
            }
    }

    protected function prepareForValidation() {
        $this->merge([
            'description'=>$this->description,
            'role_id'=>$this->roleId 
        ]);
    }
}
