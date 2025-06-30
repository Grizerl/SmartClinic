<?php

namespace Tests\Feature\Guest\Inc;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LogoutControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_logout_and_redirect_back(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->assertTrue(Auth::check());

        $response = $this->post(route('logout'));

        $response->assertRedirect(route('guest.show'));

        $this->assertFalse(Auth::check());
    }
}
