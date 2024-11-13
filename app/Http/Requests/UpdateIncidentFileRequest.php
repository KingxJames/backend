<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIncidentFileRequest extends FormRequest
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
            $method = $this->method();
            if($method == 'PUT') {
                return [
                    'path'=>['required'],
                    'comment'=>['required'],
                    'messageId'=>['required'],
                    ];
        } else {
            return [
                'path'=>['sometimes','required'],
                'comment'=>['someimtes','required'],
                'messageId'=>['sometimes','required'],
                ];
        }
    }

    protected function prepareForValidation() {
        $this->merge([
            'message_id'=>$this->messageId,
        ]);
    }
}