<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return $this->bookService->getAllBooks();
    }

    public function show($id)
    {
        return $this->bookService->getBookById($id);
    }
}
