<?php

namespace Database\Factories;
use App\Models\Events;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class EventsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
	protected $model = Events::class;
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
