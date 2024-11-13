<?php

namespace Database\Seeders;

use App\Models\Card;
use Faker\Generator;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        for ($i=0; $i < 10; $i++) {
            Card::create([
                'number' => $faker->creditCardNumber(),
                'expiry_month' => '12',
                'expiry_year' => '2028',
                'start_month' => null,
                'start_year' => null,
                'issue_number' => null,
            ]);
        }
    }
}
