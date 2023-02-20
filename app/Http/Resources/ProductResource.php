<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "id"=>$this->id,
            "title"=>$this->title,
            "desc"=>$this->desc,
            "rate"=>$this->rate,
            "price"=>$this->price,
            "category_id"=>$this->category_id,
            "image"=>asset('storage')."/". $this->image,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at
        ];
    }
}
