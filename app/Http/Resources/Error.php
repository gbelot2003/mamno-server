<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Error extends JsonResource
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
            'program' => $this->program,
            'message' => $this->message,
            'createdAt' => $this->created_at
        ];
    }
}
