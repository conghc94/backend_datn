<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Manage the system'
            ],
        	[
        		'name' => 'customer',
        		'display_name' => 'Customer',
        		'description' => 'Guest visit the system'
        	]
        ];

        foreach ($roles as $key => $role) {
        	Role::create($role);
        }
    }
}
