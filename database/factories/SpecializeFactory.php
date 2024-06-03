<?php

namespace Database\Factories;

use App\Models\Specialize;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SpecializeFactory extends Factory
{
    protected $model = Specialize::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => 'childerns.png' ,
            'active' => 1

        ];
    }
}
