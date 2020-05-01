<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->Description,
            'MRP' => $this->price,
            'Discount' => $this->discount,
            'Final Price' => strval(round((1 - $this->discount / 100) * $this->price)),

            'stock' => strval($this->stock > 0 ? $this->stock  : 'Out of Stock'),
            'rating' => strval($this->reviews->count() == 0 ? 'No rating yet' : round(($this->reviews->sum('rating')) / $this->reviews->count(), 2)),
            'reviews' => $this->reviews->count() == 0 ? 'No reviews yet' : [
                'link' => route('reviews.index', $this->id)
            ]
        ];
    }
}
