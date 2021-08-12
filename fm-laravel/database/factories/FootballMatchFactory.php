<?php

namespace Database\Factories;

use App\Models\Division;
use App\Models\FootballMatch;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

class FootballMatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FootballMatch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fm_year' => Date('Y'),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ];
    }
}
