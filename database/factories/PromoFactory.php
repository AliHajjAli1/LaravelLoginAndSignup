<?php

namespace Database\Factories;

use App\Models\Promo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'promo' => $this->faker->word,
            'isValid' => $this->faker->boolean,
        ];
    }
}
