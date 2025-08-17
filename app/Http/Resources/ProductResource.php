<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => (float) $this->price,
            'images' => $this->images->map(fn($img) => [
                'id' => $img->id,
                'url' => $img->url,
                'sort_order' => $img->sort_order,
            ]),
        ];
    }
}
