<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helpers;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Product = Product::get();

        return view('home',['Product' => $Product]);
    }
}
