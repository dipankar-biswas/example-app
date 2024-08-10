<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function(){
    Route::get("/","home")->name("home");
});

Route::controller(AuthController::class)->group(function(){
    Route::get("/login","login")->name("login");
    Route::post("/login","auth_login")->name("auth.login");
    Route::get("/register","register")->name("register");
    Route::post("/register","auth_register")->name("auth.register");
    Route::get("/logout","logout")->name("logout");
});

Route::controller(ProductController::class)->group(function(){
    Route::get("/referral-member","referralMember")->name("referral.member");

    Route::get("/products","index")->name("product.list");
    Route::get("/product-create","create")->name("product.create");
    Route::post("/product-add","store")->name("product.add");
    Route::get("/product-show/{id}","show")->name("product.show");
    Route::get("/product-edit/{id}","edit")->name("product.edit");
    Route::post("/product-update/{id}","update")->name("product.update");
    Route::get("/product-delete/{id}","delete")->name("product.delete");
});


Route::controller(CartController::class)->group(function(){
    Route::get("/addtocart/{id}","addtocart")->name("product.addtocart");
    Route::get("/cart-delete/{id}","cartdelete")->name("cart.delete");
    Route::get("/checkout","checkout")->name("checkout");
    Route::post("/checkout-order","checkoutorder")->name("checkout.order");
    Route::get("/order-success","ordersuccess")->name("order.success");
});


Route::group(['middleware' => [
    'permission:user list | create user | update user | delete user | role list | create role | update role | delete role'
]], function () { 

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
 });

