<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRoleRequest extends FormRequest
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
            'menuId'=> ['required'],
            'roleId'=>['required'],
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'menu_id'=>$this->menuId,
            'role_id'=>$this->roleId,
        ]);
    }
}
