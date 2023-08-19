<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'commentDescription' => $this->comment_description,
            'dateCommented' => $this->date_commented,
            'userId' => $this->user_id,
            'postId' => $this->post_id,
            // 'user' => [
            //     'id' => $this->user['id'],
            //     'name' => $this->user['name'],
            //     'username' => $this->user['username'],
            //     'profilePhoto' => $this->user['profile_photo'],
            // ],
        ];
    }
}
