<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            // 'messageCategoryId'=>$this->message_category_id,
            'senderId'=>$this->sender_id,
            'topic'=>$this->topic,
            'message'=>$this->message,
            'location'=>$this->location,
            'dateSent'=>$this->date_sent,
            'isArchive'=>$this->is_archive,
            'isDeleted'=>$this->is_deleted,
            'isForwarded'=>$this->is_forwarded,
            'type'=>$this->type,
        ];
    }
}
