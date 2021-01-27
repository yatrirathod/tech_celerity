<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Response;
use File;
use \Gumlet\ImageResize;
use App\Models\Category;

class productController extends Controller
{
    public function index(){

    	$productData = Product::get();
        $categoryData = Category::get();
    	return view('product',['productData' => $productData,'categoryData' => $categoryData]);
    }
    public function insert(Request $request)
    {

        $productInsert = new Product;
        
        $productInsert->name = $request->get('name');
        $productInsert->price = $request->get('price');
    	
       if ($files = $request->file('image')) {
        // Define upload path
           $destinationPath = public_path('/images/thumnail/'); // upload path
        // Upload Orginal Image           
           $productImage = date('YmdHis') . "." . $files->getClientOriginalExtension();

           $image = new ImageResize($files->getRealPath());
           $image->crop(180, 180, ImageResize::CROPCENTER);
            $image->save($destinationPath.'/'.$productImage);
            $destinationPath = public_path('/images/');
            $files->move($destinationPath, $productImage);

            $insert['image'] = "$productImage";
            $productInsert->image ="$productImage";
        }
        $productInsert->save();

    	$data['success'] = 'success';
    	$data['message'] =  'Inserted Successfully';
    	$data['vendor']  = $productInsert;
    	return Response::json($data);
	}
}
