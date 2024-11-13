<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
                'icon'=>['required'],
                'name'=>['required'],
                'path'=>['required'],
                'parentId'=>['required'],
                'roleId'=>['required']
            ];
        }
        else {
            return [
                'icon'=>['sometimes','required'],
                'name'=>['sometimes','required'],
                'path'=>['sometimes','required'],
                'parentId'=>['sometimes','required'],
                'roleId'=>['sometimes','required']
            ];
        }
    }

    protected function prepareForValidation() {
        $this->merge([
            'parent_id'=>$this->parentId,
            'role_id'=>$this->roleId,
        ]);
    }
}
