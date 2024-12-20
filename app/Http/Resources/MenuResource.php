<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this-> id,
            'icon'=>$this->icon,
            'name'=>$this->name,
            'path'=>$this->path,
            'subMenu' => SubMenuResource::collection($this->whenLoaded('subMenus')), 
            // 'roleId'=>$this->role_id,
        ];
    }
}
