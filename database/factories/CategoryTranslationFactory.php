<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryTranslation>
 */
class CategoryTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {

        return [
        ];
    }

    public function englishName()
    {
        return $this->state(function (array $attributes) {
        return [
            'category_id' => random_int(1,4),
            'locale' => 'en',
            'name' => $this->faker->name,
        ];
        });
    }

    public function arabicName()
    {
        return $this->state(function (array $attributes) {
        return [
            'category_id' => random_int(1,4),
            'locale' => 'ar',
            'name' => $this->faker->name,
        ];
        });
    }

    public function frenshName()
    {
        return $this->state(function (array $attributes) {
            return [
                'category_id' => random_int(1,4) ,
                'locale' => 'fr',
                'name' => $this->faker->name,
            ];
        });
    }

}
