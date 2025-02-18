<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookService
{
    public function getAllBooks()
    {
        return Book::paginate(10);
    }

    public function getBookById($id)
    {
        try {
            return Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    public function createBook(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_url' => 'nullable|url',
        ]);

        if (Book::where('title', $request->title)->exists()) {
            return response()->json(['message' => 'Book already exists'], 409);
        }

        $book = new Book();
        $book->title = $request->title;
        $book->status = 'draft';
        $book->cover_url = $request->filled('cover_url') ? $request->cover_url : 'default_cover.jpg';

        $book->save();
        return response()->json($book, 201);
    }

    public function publishBook($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->status = 'published';
            $book->save();

            return response()->json($book, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    public function updateBook(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_url' => 'nullable|url',
        ]);

        try {
            $book = Book::findOrFail($id);
            $book->title = $request->title;
            $book->cover_url = $request->filled('cover_url') ? $request->cover_url : $book->cover_url;

            $book->save();
            return response()->json($book, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    public function deleteBook($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();

            return response()->json(['message' => 'Book deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }
}
