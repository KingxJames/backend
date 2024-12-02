<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
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
        if ($method == 'PUT') {

            return [
                // 'messageCategoryId'=>['required'],
                'user' => ['required'],
                // 'senderId' => ['required'],
                // 'topic' => ['required'],
                'text' => ['required'],
                'sender'=>['required'],
                // 'images' => ['required'],
                // 'location' => ['required'],
                // 'dateSent' => ['required'],
                // 'isArchive' => ['required'],
                // 'isDeleted' => ['required'],
                // 'isForwarded' => ['required'],
                // 'type' => ['required'],
                'timeStamp' => ['required', 'Date']
            ];
        } else {
            return [
                // 'messageCategoryId'=>['sometimes','required'],
                'user' => ['sometimes', 'required'],
                // 'senderId' => ['sometimes', 'required'],
                // 'topic' => ['sometimes', 'required'],
                'sender' => ['sometimes', 'required'],
                'text' => ['sometimes', 'required'],
                // 'images' => ['sometimes', 'required'],
                // 'location' => ['sometimes', 'required'],
                // 'dateSent' => ['sometimes', 'required'],
                // 'isArchive' => ['sometimes', 'required'],
                // 'isDeleted' => ['sometimes', 'required'],
                // 'isForwarded' => ['sometimes', 'required'],
                // 'type' => ['sometimes', 'required'],
                'timestamp' =>['sometimes', 'required'],


            ];
        }
    }
    protected function prepareForValidation()
    {
        $this->merge([
            // 'message_category_id' => $this-> messageCategoryId,
            // 'sender_id' => $this->senderId,
            // 'date_sent' => $this->dateSent,
            // 'is_archive' => $this->isArchive,
            // 'is_deleted' => $this->isDeleted,
            // 'is_forwarded' => $this->isForwarded,
            // 'time_stamp' => $this -> timeStamp
        ]);
    }
}
