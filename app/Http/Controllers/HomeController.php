<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function home() {
        $products = Product::where('status',1)->get();
        return view('index',compact('products'));
    }
}
