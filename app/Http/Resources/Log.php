<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Log extends JsonResource
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
            'userId' => $this->user_id,
            'informationType' => $this->information_type,
            'registryKey' => $this->registry_key,
            'registryKeyDescription' => $this->registry_key_description,
            'summary' => $this->summary,
            'createdAt' => $this->created_at
        ];
    }
}
