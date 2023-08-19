<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'postDescription' => $this->post_description,
            'imgPost' => $this->img_post,
            'dateCreated' => $this->date_created,
            'userId' => $this->user_id,
            'user' => [
                    'id' => $this->user['id'],
                    'name' => $this->user['name'],
                    'profile_photo' => $this->user['profile_photo'],
                ],
            // 'comment' => $this->comments,
        ];
    }
}
