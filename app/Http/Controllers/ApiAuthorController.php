<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class ApiAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'author_name' => 'required|string',
        ]);

        $author = Author::create($data);

        return response()->json($author, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        if (!$author) {
            return response()->json(['message' => 'Autor no encontrado'], 404);
        }

        return response()->json($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        if (!$author) {
            return response()->json(['message' => 'Autor no encontrado'], 404);
        }

        $data = $request->validate([
            'author_name' => 'required|string',
        ]);

        $author->update($data);

        return response()->json($author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return response()->json(['message' => 'Autor eliminado']);
    }
}
