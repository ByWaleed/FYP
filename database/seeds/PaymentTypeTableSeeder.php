<?php

use Illuminate\Database\Seeder;

class PaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('payment_types')->insert(['paymentCode' => "202",'description' => "Visa"]);
      DB::table('payment_types')->insert(['paymentCode' => "203",'description' => "American Express"]);
      DB::table('payment_types')->insert(['paymentCode' => "204",'description' => "Master Card"]);
      DB::table('payment_types')->insert(['paymentCode' => "101",'description' => "Accommodation"]);
      DB::table('payment_types')->insert(['paymentCode' => "205",'description' => "Debit"]);
    }
}
