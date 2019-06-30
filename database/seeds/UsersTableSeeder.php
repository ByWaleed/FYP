<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert(['fullname' => "Jack Batesons",'email' => "admin@gmail.com",'password' => bcrypt('letmein'),'userType' => "1",'userLevel'=>'1','position'=> "admin",'contactNumber'=> "01234567890",'doorNum'=> "1",'streetName' => "ABC Road1",'postcode' => "AB12BC", 'city' => "Bradford",'country' => "UK",'NINum' => "PN582570C"]);
      DB::table('users')->insert(['fullname' => "Jack Batesons",'email' => "Receptionist@gmail.com",'password' => bcrypt('letmein'),'userType' => "0",'userLevel'=>'2','position'=> "admin",'contactNumber'=> "01234567890",'doorNum'=> "1",'streetName' => "ABC Road1",'postcode' => "AB12BC", 'city' => "Bradford",'country' => "UK",'NINum' => "PN582570C"]);
      DB::table('users')->insert(['fullname' => "Jack Batesons",'email' => "cleaner@gmail.com",'password' => bcrypt('letmein'),'userType' => "0",'userLevel'=>'3','position'=> "admin",'contactNumber'=> "01234567890",'doorNum'=> "1",'streetName' => "ABC Road1",'postcode' => "AB12BC", 'city' => "Bradford",'country' => "UK",'NINum' => "PN582570C"]);
    }
}
