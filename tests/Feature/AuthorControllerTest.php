<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_an_author()
    {
        // Crear un usuario autenticado
        $user = User::factory()->create();

        // Simular los datos del autor
        $authorData = [
            'name' => 'Gabriel García Márquez',
            'bio' => 'Gabriel García Márquez fue un escritor, periodista y novelista colombiano, considerado uno de los autores más significativos del siglo XX y una figura clave en el realismo mágico. Su obra más famosa, "Cien años de soledad", es un referente literario que explora la vida y los desafíos de varias generaciones de la familia Buendía en el mítico pueblo de Macondo. Su estilo único, lleno de simbolismo, fantasía y realidad entremezcladas, le valió el Premio Nobel de Literatura en 1982. A lo largo de su carrera, García Márquez también fue reconocido por su activismo político y por su influencia en la literatura latinoamericana.',
        ];

        // Enviar la petición POST para crear el autor
        $response = $this->actingAs($user)
            ->post(route('author.store'), $authorData);

        // Asegurar que se redirecciona correctamente
        $response->assertRedirect(route('author.index'));

        // Verificar que el autor fue creado en la base de datos
        $this->assertDatabaseHas('authors', $authorData);
    }

    
    public function test_user_cant_create_an_author_with_incorrect_data()
    {
        // Crear un usuario autenticado
        $user = User::factory()->create();

        // Simular los datos del autor
        $authorData = [
            'name' => 'Vitorino Ramírez',
            'bio' => 'Biografía corta para causar un error',
        ];

        // Enviar la petición POST para crear el autor
        $response = $this->actingAs($user)
            ->post(route('author.store'), $authorData);

        // Verificar que el autor fue creado en la base de datos
        $response->assertSessionHasErrors(['bio']);
    }

    public function test_user_can_delete_an_author()
    {
        // Crear un usuario autenticado
        $user = User::factory()->create();
        $author = Author::factory()->create();

        $response = $this->actingAs($user)->delete(route('author.destroy', $author));

        $this->assertDatabaseMissing('authors', ['id' => $author->id]);
    }
}
