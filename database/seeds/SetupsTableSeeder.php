<?php

use Illuminate\Database\Seeder;
use App\Models\Setup;

class SetupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setups = [
            [
                'sql_server_utilization' => '30',
                'system_idle_process' => '80',
                'other_process_cpu' => '50',
                'available_physical_memory'=> '80',
            ],[
                'sql_server_utilization' => '50',
                'system_idle_process' => '90',
                'other_process_cpu' => '60',
                'available_physical_memory'=> '90',
            ]
        ];

        foreach ($setups as $key => $value) {
            Setup::create($value);
        }
    }
}
