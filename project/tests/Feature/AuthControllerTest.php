<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    public function test_auth_with_valid_credentials_redirects_and_authenticates()
    {
        $this->get('/login');

        $user = User::factory()->create([
            'password' => Hash::make('secret123'),
        ]);

        $data = [
            'email' => $user->email,
            'password' => 'secret123',
        ];

        $this->post('/login', $data)
            ->assertStatus(302)
            ->assertRedirect('/');

        $this->assertTrue(Auth::check());
    }

    public function test_auth_with_invalid_credentials_redirects_with_errors()
    {

        $this->get('/login');

        $data = [
            'email' => 'invalid@example.com',
            'password' => 'wrongpassword',
        ];

        $this->post('/login', $data)
            ->assertStatus(302)
            ->assertRedirect('/login')
            ->assertSessionHasErrors('Неверный логин или пароль');

    }

    public function test_logout_clears_session_and_redirects()
    {
        $this->get('/login');

        $user = User::factory()->create();
        $this->actingAs($user); // Simulate logged-in user

        $this->get('/logout')
            ->assertStatus(302)
            ->assertRedirect('/login');

        $this->assertFalse(Auth::check());
    }
}
