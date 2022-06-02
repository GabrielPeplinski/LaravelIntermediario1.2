<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

class BorrowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Borrow::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $datetime = $this->faker->dateTimeBetween('-1 month', 'now');
        $user = User::factory();

        return [
            'created_at' => $datetime,
            'return_date' => $datetime,
            'book_id' => Book::factory()->state(
                [
                    'user_id' => $user
                ]
            ),
            'user_id' => $user
        ];
    }
}
