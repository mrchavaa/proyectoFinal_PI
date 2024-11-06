<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AuthorController extends Controller implements HasMiddleware
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
        $authors = Author::all();
        return view('authors.index-author', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create-author');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'bio' => 'required|string|min:100|max:1000',
        ], [
            'name.required' => 'El nombre del autor es obligatorio.',
            'bio.required' => 'La biografía del autor es obligatoria.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',
            'bio.min' => 'La biografía es muy corta (mínimo 100 caracteres)',
            'bio.max' => 'La biografía no debe exceder los 1000 caracteres.'
        ]);
        
        $author = Author::create($request->all());

        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show-author', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit-author', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|max:255',
            'bio' => 'required|string|min:100|max:1000',
        ], [
            'name.required' => 'El nombre del autor es obligatorio.',
            'bio.required' => 'La biografía del autor es obligatoria.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',
            'bio.min' => 'La biografía es muy corta (mínimo 100 caracteres)',
            'bio.max' => 'La biografía no debe exceder los 1000 caracteres.'
        ]);

        
        $author->update($request->all());
        return redirect()->route('author.show', $author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index');
    }
}
