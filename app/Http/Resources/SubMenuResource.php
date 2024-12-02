<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubMenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray(request: $request);
        return [
            'id' => $this->id,
            'icon' => $this->icon,
            'name' => $this->name,
            'path' => $this->path,
            'menuId' => $this->menu_id
        ];
    }
}
