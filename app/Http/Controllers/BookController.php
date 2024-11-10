<?php

namespace App\Http\Controllers;

use App\Mail\NewBookNotification;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;


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
        /*Cargar relación de Book con Author
        (cada libro le pertenece a un autor)
        para resolver problema de N+1 consultas*/
        $books = Book::with('author')->get();
        return view('books.index-book', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*Se utiliza all() en ambos modelos porque no es 
        necesario cargar las relaciones, ya que la idea es
        mostrar al usuario los autores y los géneros que hay
        disponibles para que los asigne al libro que está creando*/
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

         // Send email to all subscribers
         $users = User::pluck('email');
         foreach ($users as $user) {
             Mail::to($user)->send(new NewBookNotification($book));
         }       

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
         /*Se utiliza all() en ambos modelos porque no es 
        necesario cargar las relaciones, ya que la idea es
        mostrar al usuario los autores y los géneros que hay
        disponibles mediante la vista para que pueda verlos*/
        $authors = Author::all();
        $genres = Genre::all();
        return view('books.show-book', compact('book', 'authors', 'genres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        try{
            Gate::authorize('update', $book);

            /*Cargar relación de Author con Book
            (un autor puede tener muchos libros)
            para resolver problema de N+1 consultas*/
            $authors = Author::with('books')->get();
            
            /*Solo mostrar los géneros, no es necesario
            cargar la relación con Book*/
            $genres = Genre::all();
            return view('books.edit-book', compact('book', 'authors', 'genres'));
        } catch(AuthorizationException $e){
            return redirect()->route('book.index')->with('No eres el propietario de este libro');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        try{
            Gate::authorize('update', $book);
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
        } catch(AuthorizationException $e){
            return redirect()->route('book.index')->with('No eres el propietario de este libro');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try{
            Gate::authorize('delete', $book);
            $book->delete();
            return redirect()->route('book.index');
        } catch(AuthorizationException $e){
            return redirect()->route('book.index')->with('No puedes eliminar este libro porque no eres el propietario');
        }

    }
}
