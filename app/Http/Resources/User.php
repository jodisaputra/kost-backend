<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'roles' => $this->roles,
            'phoneNumber' => $this->phone_number,
            'gender' => $this->gender,
            'profilePhoto' => $this->profile_photo,
            'joinedOn' => $this->created_at->toFormattedDateString()
        ];
    }
}
