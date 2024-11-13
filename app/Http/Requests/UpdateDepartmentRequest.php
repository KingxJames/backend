<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
        $method = $this->method();
        if($method == 'PUT') {
            return [
                'name'=>['required'],
                'messageId'=>['required'],
            ];
        }
        else {
            return [
                'name'=>['sometimes','required'],
                'messageId'=>['sometimes','required'],
            ];
        }
    }

    protected function prepareForValidation() {
        $this->merge([
            'name'=>$this->name,
            'message_id'=>$this->messageId
        ]);
    }
}
