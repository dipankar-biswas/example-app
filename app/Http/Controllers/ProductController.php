<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function referralMember(Request $request){
        
        // function display($num){
        //     if($num <= 7){
        //         echo "$num <br>";
        //         display($num+1);
        //     }
        // }
        // display(1);

        $referUserId = Session::get('id');
        for ($level = 1; $level <= 7; $level++) {
            $referringUser = User::where('id', $referUserId)->first();

            // Calculate referral bonus based on the product price and referrer's percentage
            // $referralBonus = $product->price * ($referringUser->referral_percentage / 100);
            $referralBonus = (240 * $referringUser->referral_percentage) / 100;

            // Record the referral bonus in your system or update referrer's balance
            $referringUser->referral_balance = $referringUser->referral_balance + $referralBonus;
            $referringUser->save();

            $referUserId = User::where('id', $referUserId)->first()->referring_user_id;
            if ($referUserId == "") {
                break;
            }
        }
        if($referringUser){
            return 'Ok';
        }else{
            return 'Error';
        }
    }

    public function index(){
        $products = Product::where('status',1)->get();
        return view('product.product_list',compact('products'));
    }

    public function create(){
        return view('product.product_add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|unique:products|max:255',
            'price' => 'required|string',
            'stock' => 'required|string',
            'description' => 'required|string',
        ]);

        $product = new Product();
        // if(isset($request->image)){
        //     $path = $request->image;
        //     $file = "uploads/product/".substr(md5(time()),0,10).".".$path->getClientOriginalExtension();
        //     Image::make($request->image)->save($file, 20);
        //     $product->image = $file;
        // }
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();


        if($product){
            return redirect()->route('product.list')->with('success','Product Upload Successfully');
        }else{
            return redirect()->back()->with('error','Product Upload not Success');
        }
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('product.product_view',compact('product'));
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('product.product_edit',compact('product'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:products,name,'.$id,
            'price' => 'required|string',
            'stock' => 'required|string',
            'description' => 'required|string',
        ]);

        $product = Product::findOrFail($id);
        // if(isset($request->image)){
        //     $path = $request->image;
        //     $file = "uploads/product/".substr(md5(time()),0,10).".".$path->getClientOriginalExtension();
        //     Image::make($request->image)->save($file, 20);
        //     $product->image = $file;
        // }
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();


        if($product){
            return redirect()->route('product.list')->with('success','Product Upload Successfully');
        }else{
            return redirect()->back()->with('error','Product Upload not Success');
        }
    }

    public function delete($id){
        $delete = Product::findOrFail($id)->delete();
        if($delete){
            return redirect()->back()->with('success','Product Delete Successfully');
        }else{
            return redirect()->back()->with('error','Product not Delete');
        }
    }
}
