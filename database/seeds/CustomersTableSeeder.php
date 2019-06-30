<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Jack",'lastname' => "Batesons",'doorNum' => "1" ,'streetName' => "ABC Road1",
      'city' => "Bradford",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Adam",'lastname' => "Batesons",'doorNum' => "1" ,'streetName' => "Ave Smith",
      'city' => "York",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Tim",'lastname' => "Adam",'doorNum' => "1" ,'streetName' => "Lookwood road",
      'city' => "Leeds",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Steven",'lastname' => "Tim",'doorNum' => "1" ,'streetName' => "Queens Road",
      'city' => "Halifax",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Jack",'lastname' => "Tim",'doorNum' => "1" ,'streetName' => "Hilifax Road",
      'city' => "Shipley",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Tim",'lastname' => "Richard",'doorNum' => "1" ,'streetName' => "Leeds Road",
      'city' => "Huddersfield",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Steven",'lastname' => "Smith",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Smith",'lastname' => "Richard",'doorNum' => "1" ,'streetName' => "James Road",
      'city' => "Snawdunia",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Joan",'lastname' => "Alex",'doorNum' => "1" ,'streetName' => "St Jones Road",
      'city' => "London",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Alex",'lastname' => "Batesons",'doorNum' => "1" ,'streetName' => "Birkby hall Road",
      'city' => "Liverpool",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Rachiel",'lastname' => "Batesons",'doorNum' => "1" ,'streetName' => "Tim Road",
      'city' => "Cambridgh",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Daniel",'lastname' => "Rachiel",'doorNum' => "1" ,'streetName' => "Steven Road",
      'city' => "Oxford",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Shaz",'lastname' => "Daniel",'doorNum' => "1" ,'streetName' => "Adams Road",
      'city' => "Hull",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Steven",'lastname' => "Willson",'doorNum' => "1" ,'streetName' => "Tong Streen",
      'city' => "Manchester",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Garry",'lastname' => "Willson",'doorNum' => "1" ,'streetName' => "Sunbright Road",
      'city' => "Sheffield",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Garry",'lastname' => "Smith",'doorNum' => "1" ,'streetName' => "Emm Lane",
      'city' => "Rotherham",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Smith",'lastname' => "Garry",'doorNum' => "1" ,'streetName' => "Heaton Road",
      'city' => "Watford",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Smith",'lastname' => "Garry",'doorNum' => "1" ,'streetName' => "Toller Lane",
      'city' => "Milton Keynes",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Adam",'lastname' => "Batesons",'doorNum' => "1" ,'streetName' => "Ave Smith",
      'city' => "York",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Steven",'lastname' => "Smith",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Smith",'lastname' => "Steven",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "jack",'lastname' => "Steven",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Garry",'lastname' => "Steven",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Willson",'lastname' => "Steven",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Steven",'lastname' => "Willson",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Richard",'lastname' => "Willson",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Willson",'lastname' => "Richard",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Adam",'lastname' => "Richard",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Willson",'lastname' => "Adam",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Garry",'lastname' => "Willson Richard",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);
      DB::table('customers')->insert(['title' => "Mr",'firstname' => "Shaz",'lastname' => "Richard",'doorNum' => "1" ,'streetName' => "Wakefield Road",
      'city' => "Cardiff",'postcode' => "AB12BC",'country' => "UK",'phone' => "01234567890","email"=>"123@gmail.com"]);

    }
}
