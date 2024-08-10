<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;

class CartController extends Controller
{
    public function addtocart($id){
        $session_id = Session::getId();
        $data = Product::findOrFail($id);

        $check = Cart::where('session_id',$session_id)->where('product_id',$id)->count();
        if(!$check){
            $cart = new Cart();
            $cart->session_id = $session_id;
            $cart->product_id = $id;
            $cart->name = $data->name;
            $cart->price = $data->price;
            $cart->quantity = 1;
            $cart->save();

            if($cart){   
                return redirect()->back()->with('success', 'Product Add To Cart successfully!'); 
            }else {
                return redirect()->back()->with('error', 'Product not Add To Cart!');   
            }
        }else{
            $cart = Cart::where('session_id',$session_id)->where('product_id',$id)->first();
            $cart->quantity = $cart->quantity + 1;
            $cart->save();

            if($cart){   
                return redirect()->back()->with('success', 'Product Add To Cart successfully!'); 
            }else {  
                return redirect()->back()->with('error', 'Product Add To Cart Already!');   
            }
        }
    }

    public function cartdelete($id){
        $session_id = Session::getId();
        $delete = Cart::where('session_id',$session_id)->where('id',$id)->delete();
        if($delete){   
            return redirect()->back()->with('success','Product Cart Delete successfully!'); 
        }else {
            return redirect()->back()->with('error','Something Wrong!');   
        }
    }


    public function checkout(){
        $session_id = Session::getId();
        $products = Cart::where('session_id',$session_id)->get();
        return view('checkout',compact('products'));
    }

    public function checkoutorder(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required',
            'address' => 'required|string',
        ]);
        $session_id = Session::getId();
        $productItems = Cart::where('session_id',$session_id)->count('id');
        $products = Cart::where('session_id',$session_id)->get();
        if($productItems > 0){
            $order = new Order();
            $order->user_id = Session::get('id');
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->save();
            
            foreach($products as $item){
                $orders = new OrderProduct();
                $orders->order_id = $order->id;
                $orders->user_id = Session::get('id');
                $orders->product_id = $item->product_id;
                $orders->name = $item->name;
                $orders->price = $item->price;
                $orders->quantity = $item->quantity;
                $orders->save();

                Cart::where('session_id',$session_id)->where('product_id',$item->product_id)->delete();
            }

            if($order){  
                $mailData = [
                    'title' => 'Mail from MY IT',
                    'body' => 'This is for testing email using smtp.',
                ];
                Mail::to($request->email)->send(new DemoMail($mailData));

                return redirect()->route('order.success')->with([
                    'success' => 'Order Success',
                    'orderInfo' => $order,
                    'products' => $products,
                ]); 
            }else {
                return redirect()->back()->with('error', 'Product not updated!');   
            }
        }else{
            return redirect()->back()->with('error', 'Product Cart not Found!');   
        }
    }

    public function ordersuccess(){
        return view('success');
    }
}
