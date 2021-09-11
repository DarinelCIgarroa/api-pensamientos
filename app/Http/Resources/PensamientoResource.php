<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PensamientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'pensamiento';

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans()
        ];
    }

    public function with($request)
    {
        return [
            'res' => true,
        ];
    }

}
