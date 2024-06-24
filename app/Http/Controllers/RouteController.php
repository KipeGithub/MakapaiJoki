<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\flighr_routes;

class RouteController extends Controller
{
    //
    public function getRoute(Request $request)
    {
        $depad = $request->input('depad');
        $dest_ad = $request->input('dest_ad');

        $route = flighr_routes::where('departure_aero', $depad)
                                ->where('destination_aero', $dest_ad)
                                ->first();

        return response()->json($route);
    }
}
