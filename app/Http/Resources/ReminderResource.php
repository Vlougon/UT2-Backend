<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReminderResource extends JsonResource
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
            'user_id' => new UserResource($this->user),
            'beneficiary_id' => new BeneficiaryResource($this->beneficiary),
            'title' => $this->title,
            'terminated' => $this->terminated,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'observations' => $this->observations,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
    }
}
