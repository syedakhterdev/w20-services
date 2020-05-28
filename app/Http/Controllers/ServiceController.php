<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ServiceController extends Controller
{
    public function index() {
//        $response = Http::get('https://api.mapbox.com/geocoding/v5/mapbox.places/99501.json?access_token=pk.eyJ1IjoienViYWlyODEyIiwiYSI6ImNqZHlxbDBkZzJwZW0yd211ejh2dWt3a2oifQ.JLO-2btd1Wl4KI522plbBw');
//        dd($response->json());
        return view('services');
    }

    public function getListing(Request $request) {
        $response = Http::get('https://api.mapbox.com/geocoding/v5/mapbox.places/'.$request->kw.'.json?access_token=pk.eyJ1IjoienViYWlyODEyIiwiYSI6ImNqZHlxbDBkZzJwZW0yd211ejh2dWt3a2oifQ.JLO-2btd1Wl4KI522plbBw');
        $data = $response->json();
        $services = null;
        if(isset($data['features'][0]['center']) && is_array($data['features'][0]['center'])) {
            $lat = $data['features'][0]['center'][1];
            $lng = $data['features'][0]['center'][0];
            $req_services = Http::get('https://seeclickfix.com/open311/v2/services.json?lat='.$lat.'&long='.$lng);
            $services = $req_services->json();
        }
        return view('service-listing', ['services' => $services])->render();
    }
}
