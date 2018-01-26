<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Product;
use DB;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $orders = Order::all();
        if($request->has('keyword') && $request->get('keyword') != "")
        {
          $keyword = $request->get('keyword');
          $orders = Order::where('name', 'like' ,'%' . $keyword . '%')->get();
        }
        $order_details = array();
        $products = array();
        $data = array();

        foreach ($orders as $key => $order) {
            $order_details[$order['id']] = DB::table('order_details')->where('order_id', '=', $order['id'])
                                                                     ->get();
        }
        foreach ($order_details as $key => $order_detail) {
            foreach ($order_detail as $value) {
                $product = Product::find($value->product_id);
                $products[$value->id][] = $product;
            }
        }
        return view('admin.cart.listCart',['order_details'=>$order_details, 'orders'=>$orders, 'products'=>$products]);
    }
    public function getAll(Request $request)
    {
        $orders = Order::all();
        $order_details = array();
        $products = array();
        $data = array();

        foreach ($orders as $key => $order) {
            $order_details[$order['id']] = DB::table('order_details')->where('order_id', '=', $order['id'])
                                                                     ->get();
        }
        foreach ($order_details as $key => $order_detail) {
            foreach ($order_detail as $value) {
                $product = Product::find($value->product_id);
                $products[$value->id][] = $product;
            }
        }
        /*foreach ($order_details as $key => $order_detail) {
            foreach($order_detail as $value){
                $products = DB::table('products')->where('id', '=', $value->product_id)
                ->get();

                echo "<pre>";
                print_r($products[0]);
                echo "</pre>";
            }
        }
        foreach ($orders as $order) {
         
            foreach ($order_details[$order->id] as $key => $value) {
                foreach ($products[$value->id] as $value2) {
                    echo $value2['name'];
                }
            }
        }   die;
            echo "<pre>";
            print_r($products);
            echo "</pre>";
        //print_r($products->name);
        die;*/
        return view('admin.cart.listCart',['order_details'=>$order_details, 'orders'=>$orders, 'products'=>$products]);
    }

}
