<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($country) {
                return [
                    'id' => $country->id,
                    'code' => $country->code,
                    'currency' => $country->currency,
                    'area' => $country->area,
                    'language' => $country->language,
                    // 'created_at' => $country->created_at,
                    // 'updated_at' => $country->updated_at,
                    // 'trips' => TripResource::collection($this->whenLoaded('trips')),
                    '_links' => [
                        'self' => [
                            'href' => url("/api/countries/{$country->id}")
                        ]
                    ]
                ];
            }),
        ];
    }
}
