<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BoardingHouse extends JsonResource
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
            //$this->user dipanggil dari model relation di boardinghousemodel
            'user' => new User($this->user),
            'address' => $this->address,
            'mapUrl' => $this->map_url,
            'city'  => $this->city
        ];
    }
}
