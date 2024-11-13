<?php

namespace Database\Seeders;

use App\Models\Address;
use Faker\Generator;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
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
            Address::create([
                'title' => null,
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'company' => null,
                'address1' => $faker->address(),
                'address2' => null,
                'city' => $faker->city(),
                'postcode' => $faker->postcode(),
                'state' => null,
                'country' => $faker->country(),
                'phone' => null,
                'fax' => null
            ]);
        }
    }
}
