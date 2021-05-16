<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'name'   =>  $this->faker->name,
           'title'  =>  $this->faker->sentense,
           'content'=>  $this->faker->paragraph,
           'user_id'=>  $this->factory('App\Models\User')->create(),
        ];
    }
}
