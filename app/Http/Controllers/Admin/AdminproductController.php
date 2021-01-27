<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use Response;
use File;
use \Gumlet\ImageResize;
use App\Models\Category;
use App\Http\Controllers\Controller;
use DB;

class AdminproductController extends Controller
{
    public function index()
    {
    	
		
		$productData = DB::select("SELECT i.*,  c.name As CategoryName, GROUP_CONCAT(c.name) AS CategoryNames FROM products i, categorys c WHERE FIND_IN_SET(c.id, i.categorys) GROUP BY i.name");

    	return view('adminproducts',['productData' => $productData]);
    }
}
