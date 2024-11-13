<?php

namespace Database\Seeders;

use App\Models\Acquirer;
use Faker\Generator;
use Illuminate\Database\Seeder;

class AcquireSeeder extends Seeder
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
            $name = $faker->company;

            Acquirer::create([
                'name' => $name,
                'code' => $faker->text(8),
                'type' => 'CREDITCARD',
            ]);
        }
    }
}
