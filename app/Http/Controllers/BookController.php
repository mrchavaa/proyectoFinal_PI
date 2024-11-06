<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }
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
        $genres = Genre::all();
        return view('books.create-book', compact('authors', 'genres'));
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
                'genres' => 'required'
            ],
    
            [
                'title.required' => 'El título del libro es obligatorio',
                'title.min' => 'El título del libro es muy corto (mínimo 10 caracteres)',
                'description.required' => 'La descripción del libro es obligatoria',
                'description.min' => 'La descripción del libro es muy corta (mínimo 100 caracteres)',
                'author_id.required' => 'El autor es obligatorio',
                'genres.required' => 'El libro debe pertenecer al menos a un género'
            ]);

        /*ASIGNARLE AL LIBRO QUE SE ESTÁ CREANDO
        EL ID DEL USUARIO QUE LO CREÓ*/
        $request->merge([
            'user_id' => Auth::id()
        ]);

        $book = Book::create($request->all());
        $book->genres()->attach($request->genres);

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('books.show-book', compact('book', 'authors', 'genres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::with('books')->get();
        $genres = Genre::all();
        return view('books.edit-book', compact('book', 'authors', 'genres'));
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
                'genres' => 'required'
            ],
    
            [
                'title.required' => 'El título del libro es obligatorio',
                'title.min' => 'El título del libro es muy corto (mínimo 10 caracteres)',
                'description.required' => 'La descripción del libro es obligatoria',
                'description.min' => 'La descripción del libro es muy corta (mínimo 100 caracteres)',
                'author_id.required' => 'El autor es obligatorio',
                'genres.required' => 'El libro debe pertenecer al menos a un género'
            ]);

        $book->update($request->all());
        $book->genres()->sync($request->genres);
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
