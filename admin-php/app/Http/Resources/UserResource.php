<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return  [
            'avatar' => $this->avatar ?: url('static/avatar.jpeg'),
            'mobile' => $this->when(true, $this->mobile),
        ] + parent::toArray($request);
    }
}
