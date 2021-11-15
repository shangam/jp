<?php

namespace App\Http\Resources\CompanyManagement;

use App\Http\Resources\BaseResource;

class CompanyResource extends BaseResource
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
            'contact' => $this->contact,
            'address' => $this->address,
            'location' => $this->location
        ];
    }
}