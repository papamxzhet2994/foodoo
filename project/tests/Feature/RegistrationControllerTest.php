<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegistrationControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    public function test_registration_creates_user_and_redirects()
    {
        $this->mock(Registered::class);

        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ];

        $this->post('/registration', $data)
            ->assertStatus(302)
            ->assertRedirect('/email/verify');

        $this->assertDatabaseHas('users', [
            'email' => $data['email'],
        ]);

        $user = User::where('email', $data['email'])->first();
        $this->assertTrue(Hash::check($data['password'], $user->password));
    }
}
