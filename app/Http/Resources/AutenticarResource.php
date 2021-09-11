<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutenticarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nombre' => $request->name,
            'correo' => $request->email,
            'password' => bcrypt($request->password),
            'fecha_creacion' => $this->created_at->diffForHumans(),
            'fecha_actualizacion' => $this->updated_at->diffForHumans()
        ];

    }
    public function with($request)
    {
        return [
            'res' => true
        ];
    }
}
