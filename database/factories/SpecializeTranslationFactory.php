<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpecializeTranslation>
 */
class SpecializeTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    public function englishName()
    {
        return $this->state(function (array $attributes) {
            return [
                'specialize_id' => 1,
                'locale' => 'en',
                'name' => 'Children and newborns',
            ];
        });
    }

    public function arabicName()
    {
        return $this->state(function (array $attributes) {
            return [
                'specialize_id' => 1,
                'locale' => 'ar',
                'name' => 'الأطفال وحديثى الولاده',
            ];
        });
    }

    public function frenshName()
    {
        return $this->state(function (array $attributes) {
            return [
                'specialize_id' => 1,
                'locale' => 'fr',
                'name' => 'Enfants et nouveau-nés',
            ];
        });
    }


}
