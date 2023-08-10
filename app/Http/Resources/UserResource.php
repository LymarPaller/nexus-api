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
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'password' => $this->password,
            'email' => $this->email,
            'profilePhoto' => $this->profile_photo,
            'coverPhoto' => $this->cover_photo,
            'city' => $this->city,
            'websites' => $this->websites,
            'introduction' => $this->introduction,
        ];
    }
}
