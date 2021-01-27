<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $AdminArray = array(array(1, 'yatri Rathod','677868788','yatrirathod20@gmail.com','1','$2y$10$sY1tbShATfLMMZshZ882aehd1VWBzUudTZebBry4RXKpI8IHkYqIy'));
        $AdminNameArray = array();
		foreach ($AdminArray as $key => $value) {
            $createArray = array();
            if(!in_array($value[1], $AdminNameArray)){
            	array_push($AdminNameArray, $value[1]);
	            $createArray['name']  = $value[1];
	            $createArray['number']  = $value[2];
	            $createArray['email']  = $value[3];
	            $createArray['status']  = $value[4];
	            $createArray['email_verified_at']  = '';
	            $createArray['password']  = $value[5];
	            $createArray['remember_token']  = '';
	            
	            User::create($createArray);
            }
        }
    }
}
