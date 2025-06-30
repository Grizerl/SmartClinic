<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'doctor_id' => \App\Models\Doctor::factory(),
            'service_id' => \App\Models\Service::factory(),
            'status' => $this->faker->randomElement(['scheduled', 'completed', 'cancelled']),
            'created_at' => now(),
        ];
    }
}
