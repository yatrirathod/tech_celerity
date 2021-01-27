<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use Response;
use File;
use DB;
use \Gumlet\ImageResize;
use App\Models\Category;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    public function index(){
        $categoryData = DB::select("SELECT c.name As CategoryName ,p.category_id,COUNT(p.category_id) AS CNT FROM categorys c LEFT JOIN products p ON p.category_id = c.id WHERE p.category_id !=0 GROUP BY p.category_id");

    	return view('admincatgeorys',['categoryData' => $categoryData]);
    }
}
