<?php

namespace Database\Factories;

use App\Models\Support;
use App\Models\ReplySupport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplySupportFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReplySupport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'support_id' => Support::factory(),
            'description' => $this->faker->sentence(20),
        ];
    }
}
