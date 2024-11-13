<?php

namespace Database\Seeders;

use App\Models\Fx;
use Faker\Generator;
use Illuminate\Database\Seeder;

class FxSeeder extends Seeder
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
            Fx::create([
                'original_amount' => $faker->randomFloat(2, 1, 100),
                'original_currency' => $faker->currencyCode(),
            ]);
        }
    }
}
