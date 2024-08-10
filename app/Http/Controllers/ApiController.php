<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ApiController extends Controller
{
    public function products() {
        $products = Product::where('status',1)->get();
        return response()->json($products);
    }
}
