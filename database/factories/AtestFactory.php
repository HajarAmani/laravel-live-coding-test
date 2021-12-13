<?php

namespace Database\Factories;
use App\Models\Atest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class AtestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
	protected $model = Atest::class;
    public function definition()
    {
        return [
            "id" => $this->faker->uuid(),
            "name" => $this->faker->name(),
            "slug" => $this->faker->slug,
			'createdAt' => now(),
			'updatedAt' => now()
        ];
    }
}
