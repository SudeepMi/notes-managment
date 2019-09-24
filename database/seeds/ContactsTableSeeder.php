<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('contact_details')->insert([
           'name' => 'Dumaths',
           'email' => 'dumaths@info.com',
           'phone' => '980989898',
           'address' => 'Kathmandu, Nepal',
       ]);
    }
}
