<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /*Usuario puede acceder a la ruta de 'Perfil'*/
    public function test_user_can_access_route_user()
    {
        $this->withoutMiddleware();

        $user = User::factory()->create();
             $this->actingAs($user)
            ->get('/user') 
            ->assertStatus(200)
            ->assertSee('Rol'); 
    }
}

