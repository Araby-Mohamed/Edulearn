<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'from_user'     => $this->from_user,
            'to_user'       => $this->to_user,
            'content'       => $this->content,
            'created_at'    => $this->created_at->diffForHumans()
        ];
    }
}
