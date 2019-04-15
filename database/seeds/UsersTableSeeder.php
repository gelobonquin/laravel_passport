<?php

use App\Models\User;
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
        
        $users = [
        	[
        		'name' => 'Super Admin',
        		'email' => 'superadmin@gmail.com',
        		'password' => bcrypt('superadmin'),        		
        	],
        	[
        		'name' => 'Admin',
        		'email' => 'admin@gmail.com',
        		'password' => bcrypt('admin'),        		
        	],
        ];

        foreach ($users as $user) {
        	User::create($user);
        }
    }
}
