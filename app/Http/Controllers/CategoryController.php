<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Response;
use File;
use \Gumlet\ImageResize;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categoryData = Category::get();
    	return view('category',['categoryData' => $categoryData]);
    }
}
