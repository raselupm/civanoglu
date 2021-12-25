<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function properties() {
        $properties = Property::latest()->paginate(20);

        return view('admin.properties', ['properties' => $properties]);
    }

    public function addProperty() {
        $locations = Location::all();
        return view('admin.property.add', ['locations' => $locations]);
    }

    public function createProperty(Request $request) {
        $request->validate([
            'name' => 'required',
            'name_tr' => 'required',
            //'featured_image' => 'required|image',
            'location_id' => 'required',
            'price' => 'required|integer',
            'sale' => 'integer',
            'type' => 'integer',
            'bathrooms' => 'integer',
            'net_sqm' => 'integer',
            'pool' => 'integer',
            'overview' => 'required',
            'overview_tr' => 'required',
            'description' => 'required',
            'description_tr' => 'required',
        ]);


        $property = new Property();
        $property->name = $request->name;
        $property->name_tr = $request->name_tr;
        $property->featured_image = 'pending';
        $property->location_id = $request->location_id;
        $property->price = $request->price;
        $property->sale = $request->sale;
        $property->type = $request->type;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->net_sqm = $request->net_sqm;
        $property->gross_sqm = $request->gross_sqm;
        $property->pool = $request->pool;
        $property->overview = $request->overview;
        $property->overview_tr = $request->overview_tr;
        $property->why_buy = $request->why_buy;
        $property->why_buy_tr = $request->why_buy_tr;
        $property->description = $request->description;
        $property->description_tr = $request->description_tr;

        $property->save();

        return redirect(route('dashboard-properties'))->with(['message' => 'Property is added.']);
    }

    public function editProperty($property_id) {
        $property = Property::findOrFail($property_id);
        $locations = Location::all();
        return view('admin.property.edit', [
            'property' => $property,
            'locations' => $locations
        ]);
    }
}
