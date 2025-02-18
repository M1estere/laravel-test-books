<?php

namespace App\Http\Controllers;

use App\Services\GenreService;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index()
    {
        return $this->genreService->getAllGenres();
    }

    public function show($id)
    {
        return $this->genreService->getBooksByGenre($id);
    }
}
