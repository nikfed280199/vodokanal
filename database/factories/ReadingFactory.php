<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reading;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reading>
 */
class ReadingFactory extends Factory
{
    protected $model = Reading::class;

    public function definition()
    {
        return [
            'meter_id' => \App\Models\Meter::factory(),
            'value' => $this->faker->numberBetween(50, 150),
            'date' => $this->faker->date(),
        ];
    }
}
