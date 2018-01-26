<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Supplier;
use Session;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.layout-header-and-footer',function( $view ){
            $category = Category::all();
            $supplier = Supplier::all();
            $view->with('category',$category);
            $view->with('supplier',$supplier);
        });
        //Giỏ hàng HuePham

        view()->composer(['layouts.layout-header-and-footer','pay'],function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalCount'=>$cart->totalCount]);
            }
        });
        //HuePham
        view()->composer('search',function( $view ){
            $category = Category::all();
            $supplier = Supplier::all();
            $view->with('category',$category);
            $view->with('supplier',$supplier);
        });
        view()->composer('category',function( $view ){
            $category = Category::all();
            $supplier = Supplier::all();
            $view->with('category',$category);
            $view->with('supplier',$supplier);
        });
        view()->composer('supplier',function( $view ){
            $category = Category::all();
            $supplier = Supplier::all();
            $view->with('category',$category);
            $view->with('supplier',$supplier);
        });

        view()->composer('clients.product.product-detail',function($view){
            $cate = Category::all();
            $view->with('cate',$cate);
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
