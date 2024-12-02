<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRoleRequest extends FormRequest
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
                'menuId'=> ['required'],
                'roleId'=>['required'],
            ];
        }
        else {
            return [
                'menuId'=> ['sometimes','required'],
                'roleId'=>['sometimes','required'],
            ];
        }
    }
    protected function prepareForValidation() {
        $this->merge([
            'menu_id'=>$this->menuId,
            'role_id'=>$this->roleId,
        ]);
    }
}
