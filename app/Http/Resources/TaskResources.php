<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResources extends JsonResource
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
            'id'        => $this->id,
            'title'     => $this->title,
            'file'      => $this->file,
            'content'   => $this->content,
            'end_date'  => $this->end_date,
            'subject'   => $this->subject->name,
            'created_at'=> $this->created_at->diffForHumans()
        ];
    }
}
