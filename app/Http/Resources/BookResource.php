<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ['id'=>$this->id,
        'name'=>$this->name,
        'description'=>$this->description,
        'image'=>asset('storage').'/'.$this->image,
        'price'=>$this->price,
        'cat_id'=>$this->cat_id,
        'cat_name'=>$this->cat->name,
        'user_id'=>$this->user_id,
        'user_name'=>$this->user->name,
        ];
    }
}
