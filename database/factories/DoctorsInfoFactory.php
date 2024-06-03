<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorsInfo>
 */
class DoctorsInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1 ,
            'specialize_id' => 1 ,
            'min_price' => 10 ,
            'max_price' => 100 ,
            'appointment_examination_reply_time' => 50 ,
            'urgent_amount' => 10
        ];
    }
}
