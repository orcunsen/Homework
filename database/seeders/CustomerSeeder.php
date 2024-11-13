<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Card;
use App\Models\Customer;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CustomerSeeder extends Seeder
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
            $card = Card::all()->random();
            $billingAddress = Address::all()->random();
            $shippingAddress = Address::all()->random();

            Customer::create([
                'email' => $faker->email(),
                'birthday' => Carbon::parse($faker->dateTimeBetween('-50 years', '-18 years'))->format('Y-m-d H:i:s'),
                'gender' => null,
                'card_id' => $card->id,
                'billing_address_id' => $billingAddress->id,
                'shipping_address_id' => $shippingAddress->id
            ]);
        }
    }
}
