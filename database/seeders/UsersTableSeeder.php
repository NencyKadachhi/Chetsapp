<?php

namespace Database\Seeders;

use App\Models\UserLogin;
use Illuminate\Database\Seeder;
use App\Models\UserDetails;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
	    	$userLogin = UserLogin::create([
	            'username' => Str::random(40),
	            'email' => Str::random(12).'@mail.com',
	            'password' => bcrypt('123456')
	        ]);
            $UserDetails = UserDetails::create([
                'user_id' => $userLogin->id,
	            'user_image' => Str::random(8),
	            'address' => Str::random(15),
	            'city' => Str::random(8),
                'country' => Str::random(8),
                'status' =>'1',
	        ]);
    	}
    }
}
