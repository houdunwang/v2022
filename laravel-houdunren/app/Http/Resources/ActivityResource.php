<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'title' => $this->getTitle(),
            'user' => $this->causer
        ];
    }

    protected function getTitle()
    {
        if ($this->properties['type'] == 'comment') {
            return $this->subject->model->title;
        }
        return $this->subject->title;
    }
}
