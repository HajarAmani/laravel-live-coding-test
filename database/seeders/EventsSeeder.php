<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
			DB::table("events")->insert([
			"id" => $faker->uuid(),
            "name" => $faker->name(),
            "slug" => $faker->slug,
			'createdAt' => now(),
			'updatedAt' => now(),
        ]);
    }
}
