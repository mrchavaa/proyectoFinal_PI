<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea algunos libros y asigna géneros aleatorios
        $genres = Genre::all();
        Book::factory()
            ->count(10)
            ->create()
            ->each(function ($book) use ($genres) { // Usa 'use' para importar $genres
                // Asigna entre 1 y 3 géneros aleatorios a cada libro
                $book->genres()->attach(
                    $genres->random(rand(1, 3))->pluck('id')->toArray()
                );
            });
    }
}
