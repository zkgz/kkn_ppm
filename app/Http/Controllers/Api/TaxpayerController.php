<?php

namespace App\Http\Controllers\Api;

use App\taxpayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\taxpayer as taxpayerResource;

class TaxpayerController extends Controller
{
    /**
     * Get outlet listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $taxpayers = taxpayer::all();

        $geoJSONdata = $taxpayers->map(function ($taxpayer) {
            return [
                'type'       => 'Feature',
                'properties' => new TaxpayerResource($taxpayer),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $taxpayer->long,
                        $taxpayer->lat,
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
