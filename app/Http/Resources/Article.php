<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'user_id'=>"/api/users/".$this->user_id,
            'category_id'=>"/api/categories/".$this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
