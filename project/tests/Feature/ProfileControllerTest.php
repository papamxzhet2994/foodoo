<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_index_returns_profile_view_with_orders()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $orders = Order::factory()->count(2)->create(['user_id' => $user->id]);

        $response = $this->get('/profile');

        $response->assertViewIs('profile.profile')
            ->assertViewHas('orders')
            ->assertSeeText($user->name);

        $this->assertEquals($orders->count(), $response->viewData('orders')->count());
    }

    public function test_edit_returns_edit_view_with_user_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/profile/edit');

        $response->assertViewIs('profile.edit')
            ->assertViewHas('user')
            ->assertSeeText($user->email);
    }

    public function test_update_with_valid_data_redirects_and_updates_user()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $newData = [
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'example@example.com',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ];

        $response = $this->put('/profile', $newData);

        $response->assertStatus(302)
            ->assertRedirect('/profile');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'first_name' => $newData['first_name'],
            'last_name' => $newData['last_name'],
            'email' => $newData['email'],
        ]);

        $this->assertTrue(Hash::check($newData['password'], User::find($user->id)->password)); // Check password update
    }
}
