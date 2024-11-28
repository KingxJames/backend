<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'workEmail' => $this->work_rmail,
            'phoneNo' => $this->phone_no,
            'roleId' => $this->role_id,
            'picture' => $this->picture,
            'googleIDToken' => $this->google_id_token,

        ];
    }
}