<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskStudentResources extends JsonResource
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
            'file'          => $this->file,
            'task_id'       => $this->task_id,
            'student_name'  => $this->user->first_name . ' ' .$this->user->last_name,
            'subject_id'    => $this->subject_id
        ];
    }
}
