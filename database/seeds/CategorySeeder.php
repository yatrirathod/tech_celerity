<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CategoryArray = array(array(1, 'Pizza'),
								array(2, 'Juices'),
								array(3, 'MainCourse'),
								array(4, 'Starter'),
								array(5, 'Desert'));
        $CategoryNameArray = array();
		foreach ($CategoryArray as $key => $value) {
            $createArray = array();
            if(!in_array($value[1], $CategoryNameArray)){
            	array_push($CategoryNameArray, $value[1]);
	            $createArray['name']  = $value[1];
	            $createArray['status'] = 'active';
	            Category::create($createArray);
            }
        }
    }
}
