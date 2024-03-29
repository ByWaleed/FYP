<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(PaymentTypeTableSeeder::class);        
        $this->call(PaymentsTableSeeder::class);
    }
}
