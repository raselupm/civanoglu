<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Page;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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

    public function singlePage($slug) {
        $page = Page::where('slug', $slug)->first();

        if(!empty($page)) {
            return view('page', [
                'page' => $page
            ]);
        } else {
            return abort('404');
        }
    }

    public function singleLocation($id) {
        $location = Location::findOrFail($id);


    }

    public function singleProperty($id) {
        $property = Property::findOrFail($id);

        return view('property.single', ['property' => $property]);
    }

    public function propertyIndex(Request $request) {

        $latest_properties = Property::latest();
        $locations = Location::select(['id', 'name'])->get();

        if(!empty($request->sale)) {
            $latest_properties = $latest_properties->where('sale', $request->sale);
        }

        if(!empty($request->type)) {
            $latest_properties = $latest_properties->where('type', $request->type);
        }

        if(!empty($request->location)) {
            $latest_properties = $latest_properties->where('location_id', $request->location);
        }

        if(!empty($request->price)) {
            //$latest_properties = $latest_properties->where('bedrooms', $request->bedrooms);
            if($request->price == '500000') {
                $latest_properties = $latest_properties->where('price', '>', 400000)->where('price', '<=', 500000);
            }
        }

        if(!empty($request->bedrooms)) {
            $latest_properties = $latest_properties->where('bedrooms', $request->bedrooms);
        }

        if(!empty($request->property_name)) {
            $latest_properties = $latest_properties->where('name', 'LIKE', '%'. $request->property_name .'%');
        }



        $latest_properties = $latest_properties->paginate(12);


        return view('property.index', ['latest_properties' => $latest_properties, 'locations' => $locations]);
    }

    public function currencyChange($code) {
        Cookie::queue('currency', $code, 3600);

        return back();
    }
}
