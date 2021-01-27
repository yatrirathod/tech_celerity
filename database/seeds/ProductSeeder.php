<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ProductArray = array(array(1, 'Paneer Pizza','1,2',110.00),
								array(2, 'Extra Chesse','1,2',100.00),
								array(3, 'Mango Juices','1,2',110.00),
								array(4, 'Orange Juices','1,2',110.00),
								array(5, 'Lemon Juices','1,2',150.00),
								array(5, 'Paneer Plater','2,3',180.00),
								array(6, 'vallinaice-cream','1,2',110.00),
								array(7, 'Gulab jambu','4,2',190.00),
								array(8, 'Browine','3,2',200.00),
								array(9, 'chocolateice-cream','3,2',110.00));
        $ProductNameArray = array();
		foreach ($ProductArray as $key => $value) {
            $createArray = array();
            if(!in_array($value[1], $ProductNameArray)){
            	array_push($ProductNameArray, $value[1]);
	            $createArray['name']  = $value[1];
	            $createArray['categorys']  = $value[2];
	            $createArray['price']  = $value[3];
	            $createArray['image']  = '';
	            $createArray['status'] = 'active';
	            Product::create($createArray);
            }
        }
    }
}
