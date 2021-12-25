<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'name_tr' => $this->faker->sentence,
            'featured_image' => 'https://picsum.photos/1200/800',
            'location_id' => Location::all()->random()->id,
            'price' => rand(100000,500000),
            'sale' => rand(0,1),
            'type' => rand(0,2),
            'bedrooms' => rand(1,6),
            'drawing_rooms' => rand(0,3),
            'bathrooms' => rand(1,5),
            'net_sqm' => rand(55,300),
            'gross_sqm' => rand(65,450),
            'pool' => rand(0,3),
            'overview' => $this->faker->text(100),
            'overview_tr' => $this->faker->text(100),
            'why_buy' => $this->faker->text(1000),
            'why_buy_tr' => $this->faker->text(1000),
            'description' => $this->faker->text(500),
            'description_tr' => $this->faker->text(500)
        ];
    }
}
