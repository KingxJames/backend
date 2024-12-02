<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipientRequest extends FormRequest
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
                'userId'=>['required'],
                'messageId'=>['required'],
            ];
        }
        else {
            return [
                'userId'=>['sometimes','required'],
                'messageId'=>['sometimes','required'],
            ];
        }
    }

    protected function prepareForValidation() {
        $this->merge([
            'user_id'=>$this->userId,
            'message_id'=>$this->messageId,
        ]);
    }
}
