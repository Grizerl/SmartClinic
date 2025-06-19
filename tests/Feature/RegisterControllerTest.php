<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_form_is_shown(): void
    {
        $response = $this->get(route('register.show'));
        $response->assertStatus(200);
        $response->assertViewIs('guest.register');
    }

    public function test_user_can_register_and_redirects_to_login()
    {
        $email = fake()->unique()->safeEmail();
        $phone = '+380' . fake()->numerify('### ### ###');

        $response = $this->post(route('register.store'), [
            'name' => 'John Doe',
            'email' => $email,
            'phone' => $phone,
            'role' => 'user',
        ]);

        $response->assertRedirect(route('guest.show'));

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => $email,
            'phone' => $phone,
            'role' => 'user',
        ]);
    }
}
