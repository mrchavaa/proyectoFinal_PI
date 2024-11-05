<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            ['name' => 'Ficción'],
            ['name' => 'No Ficción'],
            ['name' => 'Ciencia Ficción'],
            ['name' => 'Biografía'],
            ['name' => 'Misterio'],
            ['name' => 'Romance'],
            ['name' => 'Fantasía'],
            ['name' => 'Historia'],
            ['name' => 'Terror'],
            ['name' => 'Desarrollo Personal'],
            ['name' => 'Autobiografía'],
            ['name' => 'Literatura Clásica'],
            ['name' => 'Ciencia'],
            ['name' => 'Salud'],
            ['name' => 'Psicología'],
        ]);        
    }
}
