<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'publication_year' => 'required|integer',
            'available_copies' => 'required|integer',
            'location' => 'required|string',
        ]);

        $book = Book::create($data);

        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

        if (!$book) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {

        if (!$book) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        $data = $request->validate([
            'title' => 'string',
            'author' => 'string',
            'publisher' => 'string',
            'publication_year' => 'integer',
            'available_copies' => 'integer',
            'location' => 'string',
        ]);

        $book->update($data);

        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json(['message' => 'Libro eliminado']);
    }
}
