<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'icon'=>['required'],
            'name'=>['required'],
            'path'=>['required'],
            'parentId'=>['required'],
            'roleId'=>['required']
        ];
    }

    protected function prepareForValidation() {
        $this->merge([
            'parent_id'=>$this->parentId,
            'role_id'=>$this->roleId,
        ]);
    }
}
