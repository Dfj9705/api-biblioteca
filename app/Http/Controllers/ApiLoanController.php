<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class ApiLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::with('book.publisher', 'book.location', 'book.author')->get();;
        return response()->json($loans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'isbn' => 'required|integer|exists:books,isbn',
            'loan_date' => 'required|date_format:Y-m-d H:i',
            'due_date' => 'required|date_format:Y-m-d H:i',
            'return_date' => 'required|date_format:Y-m-d H:i',
        ]);

        $loan = Loan::create($data);

        return response()->json($loan, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
