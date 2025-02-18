<?php

namespace App\Services;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GenreService
{
    public function getAllGenres()
    {
        return Genre::all();
    }

    public function getBooksByGenre($id)
    {
        try {
            $genre = Genre::findOrFail($id);
            return $genre->books()->paginate(10);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Genre not found'], 404);
        }
    }

    public function updateGenre(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $genre = Genre::findOrFail($id);
            $genre->name = $request->name;
            $genre->save();

            return response()->json($genre, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Genre not found'], 404);
        }
    }

    public function deleteGenre($id)
    {
        try {
            $genre = Genre::findOrFail($id);
            $genre->delete();

            return response()->json(['message' => 'Genre deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Genre not found'], 404);
        }
    }
}
