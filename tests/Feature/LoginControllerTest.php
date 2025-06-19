<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_login_form_is_shown()
    {
        $response = $this->get(route('guest.show'));
        $response->assertStatus(200);
        $response->assertViewIs('guest.login');
    }

    public function test_user_can_login_and_redirects_to_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'john@example.com',
            'phone' => '+380501234567',
        ]);

        $response = $this->post(route('guest.store'), [
            'email' => 'john@example.com',
            'phone' => '+380501234567',
        ]);

        $response->assertRedirect(route('dashboard.home'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_login_fails_and_redirects_back()
    {
        $response = $this->post(route('guest.store'), [
            'email' => 'wrong@example.com',
            'phone' => '+380000000000',
        ]);

        $response->assertRedirect(); 
        $this->assertGuest();
    }
}
