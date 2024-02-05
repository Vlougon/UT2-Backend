<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CallResource extends JsonResource
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
            'date' => $this->date,
            'time' => $this->time,
            'duration' => $this->duration,
            'call_type' => $this->call_type,
            'turn' => $this->turn,
            'answered_call' => $this->answered_call,
            'observations' => $this->observations,
            'description' => $this->description,
            'contacted_112' => $this->contacted_112,
        ];
    }
}
