<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Ramsey\Uuid\Uuid;

class BookController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'name' => 'required|string',
            'publisher' => 'required|string',
            'pageCount' => 'required|integer',
            'readPage' => 'required|integer|lte:pageCount',
        ]);

        // Buat buku baru dengan data yang diterima
        $book = Book::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => $request->name,
            'year' => $request->year,
            'author' => $request->author,
            'summary' => $request->summary,
            'publisher' => $request->publisher,
            'pageCount' => $request->pageCount,
            'readPage' => $request->readPage,
            'reading' => $request->reading ?? false,
            'insertedAt' => now(),
            'updatedAt' => now(),
        ]);

        // Kembalikan respons sukses
        return response()->json(['message' => 'Book created successfully', 'book' => $book], 201);
    }
}
