<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'tweet' => $this->tweet,
            'userId' => $this->user_id,
            'userName' => $this->user->name,
            'userImage' => $this->user->image,
        ];
    }
}
