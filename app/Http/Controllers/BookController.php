<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author')->get();
        return view('books.index-book', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create-book', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:10',
                'description' => 'required|min:100',
                'author_id' => 'required|exists:authors,id',
            ],
    
            [
                'title.required' => 'El título del libro es obligatorio',
                'title.min' => 'El título del libro es muy corto (mínimo 10 caracteres)',
                'description.required' => 'La descripción del libro es obligatoria',
                'description.min' => 'La descripción del libro es muy corta (mínimo 100 caracteres)',
                'author_id.required' => 'El autor es obligatorio'
            ]);

        $book = Book::create($request->all());

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $authors = Author::all();
        return view('books.show-book', compact('book', 'authors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::with('books')->get();
        return view('books.edit-book', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate(
            [
                'title' => 'required|min:10',
                'description' => 'required|min:100',
                'author_id' => 'required|exists:authors,id',
            ],
    
            [
                'title.required' => 'El título del libro es obligatorio',
                'title.min' => 'El título del libro es muy corto (mínimo 10 caracteres)',
                'description.required' => 'La descripción del libro es obligatoria',
                'description.min' => 'La descripción del libro es muy corta (mínimo 100 caracteres)',
                'author_id.required' => 'El autor es obligatorio'
            ]);

        $book->update($request->all());
        return redirect()->route('book.show', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
