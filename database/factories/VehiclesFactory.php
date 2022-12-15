<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VehiclesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'plate_no' => trim(fake()->name()),
            'email' => fake()->unique()->safeEmail(),
            'brand' => fake()->name(),
            'type' => fake()->name(),
            'apk' => fake()->name(),
            'first_registeration' => fake()->name(),
            'last_ascription' => fake()->name(),
            'engine_capacity' => fake()->name(),
            'fuel' => fake()->name(),
            'bought_from' => fake()->name(),
            'address' => fake()->name(),
            'phone' => fake()->name(),
            'email' => fake()->name(),
            'whatsapp' => fake()->name(),
            'purchase_amount' => fake()->name(),
            'remainder_amount' => fake()->name(),
            'remainder_instrument' => fake()->name(),
            'vehicle_status' => 'finished',
            'payment_status' => 'paid',
            'comment' => fake()->name(),
            'sold_name' => fake()->name(),
            'sold_amount' => fake()->name(),
            'sold_payment_status' => 'paid',
            'sold_comment' => fake()->name(),
            'sold_status' => 'sold',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
