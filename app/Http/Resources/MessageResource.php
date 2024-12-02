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
            'sender'=>$this->sender,
            'user'=>$this->user,
            // 'topic'=>$this->topic,
            'text'=>$this->text,
            'timestamp'=>$this->timestamp,
            // 'location'=>$this->location,
            // 'dateSent'=>$this->date_sent,
            // 'isArchive'=>$this->is_archive,
            // 'isDeleted'=>$this->is_deleted,
            // 'isForwarded'=>$this->is_forwarded,
            // 'type'=>$this->type,
        ];
    }
}
