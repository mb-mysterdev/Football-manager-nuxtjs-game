<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserConfig;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserConfigFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserConfig::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        ];
    }
}
