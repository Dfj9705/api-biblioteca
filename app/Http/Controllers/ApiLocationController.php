<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class ApiLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        return response()->json($locations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'location_description' => 'required|string',
        ]);

        $location = Location::create($data);

        return response()->json($location, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        if (!$location) {
            return response()->json(['message' => 'Ubicación no encontrada'], 404);
        }

        return response()->json($location);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        if (!$location) {
            return response()->json(['message' => 'Ubicación no encontrada'], 404);
        }

        $data = $request->validate([
            'location_description' => 'required|string',
        ]);

        $location->update($data);

        return response()->json($location);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        return response()->json(['message' => 'Ubicación eliminada']);
    }
}
