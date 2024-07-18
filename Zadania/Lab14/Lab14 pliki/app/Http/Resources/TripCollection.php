<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TripCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($trip) {
                return [
                    'id' => $this->id,
                    'name' => $this->name,
                    'continent' => $this->continent,
                    'period' => $this->period,
                    'description' => $this->description,
                    'price' => $this->price,
                    'country_id' => $this->country_id,
                    // 'created_at' => $country->created_at,
                    // 'updated_at' => $country->updated_at,
                    '_links' => [
                        'self' => [
                            'href' => url("/api/trips/{$trip->id}")
                        ]
                    ]
                ];
            }),
        ];
    }
}
