<?php

namespace Database\Factories\Issues;

use App\Models\Issues\Issue;
use App\Models\Issues\Status;
use App\Models\Issues\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class IssueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Issue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->words(3, true)),
            'description' => $this->faker->paragraph(2),
            'issue_type_id' => Type::all()->random()->id,
            'issue_status_id' => Status::all()->random()->id,
            'reported_by' => User::all()->random()->id,
            'assigned_to' => User::all()->random()->id,
            'created_at' => $this->faker->dateTimeBetween('-2 years', '-1 year')
        ];
    }
}
