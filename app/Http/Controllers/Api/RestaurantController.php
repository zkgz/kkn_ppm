<?php

namespace App\Http\Controllers\Api;

use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Restaurant as RestaurantResource;

class RestaurantController extends Controller
{
    /**
     * Get outlet listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $restaurants = Restaurant::all();

        $geoJSONdata = $restaurants->map(function ($restaurant) {
            return [
                'type'       => 'Feature',
                'properties' => new RestaurantResource($restaurant),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $restaurant->long,
                        $restaurant->lat,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
