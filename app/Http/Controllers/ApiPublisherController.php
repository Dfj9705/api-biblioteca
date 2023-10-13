<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class ApiPublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
        return response()->json($publishers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'publisher_name' => 'required|string',
        ]);

        $publisher = Publisher::create($data);

        return response()->json($publisher, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        if (!$publisher) {
            return response()->json(['message' => 'Publisher no encontrado'], 404);
        }

        return response()->json($publisher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        if (!$publisher) {
            return response()->json(['message' => 'Publisher no encontrado'], 404);
        }

        $data = $request->validate([
            'publisher_name' => 'required|string',
        ]);

        $publisher->update($data);

        return response()->json($publisher);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return response()->json(['message' => 'Publisher eliminado']);
    }
}

