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
                    'id' => $trip->id,
                    'name' => $trip->name,
                    'continent' => $trip->continent,
                    'period' => $trip->period,
                    'description' => $trip->description,
                    'price' => $trip->price,
                    'country_id' => $trip->country_id,
                    // 'created_at' => $trip->created_at,
                    // 'updated_at' => $trip->updated_at,
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
