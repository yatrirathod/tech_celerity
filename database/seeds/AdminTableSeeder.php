<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AdminArray = array(array(1, 'admin','admin@gmail.com','$2y$10$xRBC/7Q47jF8mnuJMkZHY.RzdM0qTyfH8TfP9j.PNRHHqqijejDrW',),);
        $AdminNameArray = array();
		foreach ($AdminArray as $key => $value) {
            $createArray = array();
            if(!in_array($value[1], $AdminNameArray)){
            	array_push($AdminNameArray, $value[1]);
	            $createArray['name']  = $value[1];
	            $createArray['email']  = $value[2];
	            $createArray['password']  = $value[3];
	            $createArray['is_super']  = 0;
	            $createArray['remember_token']  = '';
	            Admin::create($createArray);
            }
        }
    }
}
