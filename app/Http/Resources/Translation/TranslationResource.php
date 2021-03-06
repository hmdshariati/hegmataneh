<?php

namespace App\Http\Resources\Translation;

use Illuminate\Http\Resources\Json\JsonResource;

class TranslationResource extends JsonResource
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
            "field" => $this->field ,
            "trans" => $this->trans ,
        ];
    }
}
