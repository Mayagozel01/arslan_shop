<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::with('cities')->get();

        return view('admin.locations.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:3|unique:countries',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Country::create($request->all());

        return redirect()->route('admin.locations.index')->with('success', 'Country created successfully.');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.locations.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:3|unique:countries,code,' . $country->id,
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $country->update($request->all());

        return redirect()->route('admin.locations.index')->with('success', 'Country updated successfully.');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return redirect()->route('admin.locations.index')->with('success', 'Country deleted successfully.');
    }

    public function storeCity(Request $request, $countryId)
    {
        $country = Country::findOrFail($countryId);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $country->cities()->create($request->only('name'));

        return redirect()->route('admin.locations.index')->with('success', 'City added successfully.');
    }
}