<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Support extends JsonResource
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
            'id' => $this->support_id,
            'title' => $this->title,
            'description' => $this->description,
            'supportDateTime' => $this->support_dateTime,
            'solution' => $this->solution == NULL ? '' : $this->solution,
            'solutionUserId' => $this->solution_user_id == NULL ? '' : $this->solution_user_id,
            'solutionDateTime' => $this->solution_dateTime == NULL ? '' : $this->solution_dateTime,
            'supportTypeId' => $this->support_type_id == NULL ? '' : $this->support_type_id,
            'status' => $this->status,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
