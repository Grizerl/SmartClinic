<?php

namespace Tests\Feature\Doctor;

use App\Models\Doctor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_form_is_show_doctor()
    {
        $response = $this->get(route('personnel.show'));
        $response->assertStatus(200);
        $response->assertViewIs('doctor.inc.login');
    }

    public function test_doctor_can_login_and_redirect_to_dashboard()
    {
        $doctor = Doctor::factory()->create([
            'phone' => '+380501234566',
            'email' => 'doctor@example.com'
        ]);

        $response = $this->post(route('personnel.store'),[
            'phone' => '+380501234566',
            'email' => 'doctor@example.com',
        ]);

        $response->assertRedirect(route('dashboard.doctor'));
        $this->assertAuthenticatedAs($doctor, 'doctor');
    }

    public function test_login_fails_and_redirect_back(): void
    {
        $response = $this->post(route('personnel.store'), [
            'phone' => '+380501234056',
            'email' => 'doctorfake@example.com'
        ]);

        $response->assertRedirect();
        $this->assertGuest();
    }

}
