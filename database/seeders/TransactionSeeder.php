<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Acquirer;
use App\Models\Customer;
use App\Models\Fx;
use App\Models\Merchant;
use App\Models\Transaction;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(Generator::class);

        for ($i=0; $i < 100; $i++) {
            $merchant = Merchant::all()->random();
            $aquirer = Acquirer::all()->random();
            $customer = Customer::all()->random();
            $fx = Fx::all()->random();

            Transaction::create([
                'transaction_id' => $faker->text(32),
                'merchant_id' => $merchant->id,
                'acquirer_id' => $aquirer->id,
                'customer_id' => $customer->id,
                'fx_id' => $fx->id,
                'reference_no' => null,
                'status' => $faker->randomElement(['WAITING', 'APPROVED', 'DECLINED', 'ERROR']),
                'payment_method' => $faker->randomElement(['CREDITCARD', 'CUP', 'IDEAL', 'GIROPAY', 'MISTERCASH', 'STORED', 'PAYTOCARD', 'CEPBANK', 'CITADEL']),
                'channel' => 'API',
                'custom_data' => null,
                'chain_id' => $faker->text(10),
                'agent_info_id' => $faker->text(10),
                'operation' => $faker->randomElement(['DIRECT', 'REFUND', 'VOID', '3D', '3DAUTH']),
                'acquirer_transaction_id' => $faker->text(10),
                'code' => '00',
                'message' => 'WAITING',
                'agent' => json_encode([
                    'id' => 1,
                    'customerIp' => $faker->ipv4(),
                    'customerUserAgent' => $faker->userAgent(),
                    'merchantIp' => $faker->ipv4(),
                ]),
                'ipn' => true,
                'refundable' => true
            ]);
        }
    }
}
