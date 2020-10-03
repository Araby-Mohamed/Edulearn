<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'         => $this->id,
            'ssn'        => $this->ssn,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'email'      => $this->email,
            'phone'      => $this->phone,
            'birthDate'  => $this->birthDate,
            'address'    => $this->address,
            'gender'     => $this->gender,
            'level'      => $this->level,
            'image'      => ($this->level == 1) ? url('media/images/student/'.$this->image) : url('media/images/professor/'.$this->image),
            'api_token'  => $this->api_token,
        ];
    }
}
