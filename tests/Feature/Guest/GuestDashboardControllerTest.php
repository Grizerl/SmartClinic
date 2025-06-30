<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\User;
use Tests\TestCase;

class GuestDashboardControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_authenticated_user_can_access_dashboard(): void
    {
        $user = User::factory()->create();

        Appointment::factory()->create([
            'user_id' => $user->id,
            'created_at' => now()->addDay(),
        ]);

        Appointment::factory()->create([
            'user_id' => $user->id,
            'created_at' => now()->subDay(),
        ]);

        MedicalRecord::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->get(route('dashboard.home'));

        $response->assertStatus(200);
        $response->assertViewIs('partials.dashboard');

        $response->assertViewHas('futureAppointment');
        $response->assertViewHas('pastAppointment');
        $response->assertViewHas('medicalRecord');
    }

}
