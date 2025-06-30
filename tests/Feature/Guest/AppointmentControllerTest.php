<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\Service;
use App\Models\User;
use Tests\TestCase;

class AppointmentControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_displays_appointment_form_with_data(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Doctor::factory()->create([
            'name' => 'Doc1',
            'specialization' => 'Spec1',
        ]);

        Service::factory()->create([
            'name' => 'Ser1',
            'price' => 100,
        ]);

        $response = $this->get(route('appointments.create'));

        $response->assertStatus(200);
        $response->assertViewIs('guest.appointment.appointment');

        $response->assertViewHas('doctor');
        $response->assertViewHas('service');

    }

    public function test_authenticated_user_can_store_appointment(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $doctor = Doctor::factory()->create();
        $service  = Service::factory()->create();

        $data = [
            'doctor_id' => $doctor->id,
            'service_id' => $service->id,
            'created_at' => now(),
        ];

        $response = $this->post(route('appointments.store'), $data);

        $response->assertRedirect(route('dashboard.home'));

        $this->assertDatabaseHas('appointments', [
            'doctor_id' => $doctor->id,
            'service_id' => $service->id,
            'created_at' => now(),
        ]);
    }
}
