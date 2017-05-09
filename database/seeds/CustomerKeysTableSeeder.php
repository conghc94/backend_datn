<?php

use Illuminate\Database\Seeder;

class CustomerKeysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_keys')->insert([
            'customer_id' => '2',
            'key' => '38bc6b80-1b6b-11e7-a758-25c2188dfa46'
            ]);
    }
}
