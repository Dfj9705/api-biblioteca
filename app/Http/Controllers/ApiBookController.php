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
            'isbn'=> 'required|string|size:13',
            'title'=> 'required|string',
            'author_id'=> 'required|string|exists:authors,id',
            'publisher_id'=> 'required|string|exists:publishers,id',
            'publication_year'=> 'required|integer|date_format:Y',
            'available_copies'=> 'required|integer',
            'location_id'=> 'required|string|exists:locations,id',
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
            'isbn'=> 'required|string|size:13',
            'title'=> 'required|string',
            'author_id'=> 'required|string|exists:authors,id',
            'publisher_id'=> 'required|string|exists:publishers,id',
            'publication_year'=> 'required|integer|date_format:Y',
            'available_copies'=> 'required|integer',
            'location_id'=> 'required|string|exists:locations,id',
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
