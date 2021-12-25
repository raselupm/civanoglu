<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home() {
        $latest_properties = Property::latest()->get()->take(4);
        $locations = Location::select(['id', 'name'])->get();

        //dd($latest_properties);

        return view('welcome', [
            'latest_properties' => $latest_properties,
            'locations' => $locations
        ]);
    }
}
