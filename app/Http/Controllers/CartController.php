<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Cart;
use Sesion;
class CartController extends Controller
{
    public $cartModel;

    public function __construct()
    {
        $this->cartModel = new Cart();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(){
        session_start();

        $code = $_GET['code'];

        $product = $this->cartModel->find($code);
        $kt = true;
        
        if (isset($_SESSION['cart'][$code]))
            (int)$_SESSION['cart'][$code]['count']++;
        else {
            $product['count'] = 1;
            $_SESSION['cart'][$code] = $product;
        }
    }

    public function showCart(){
        return View::make('cart', $data = $_SESSION['cart']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        if ((int)$_SESSION['cart'][$_GET['code']]['count'] <= 1)
            unset($_SESSION['cart'][$_GET['code']]);
        else 
        {
            (int)$_SESSION['cart'][$_GET['code']]['count']--;
        }

        return View::make('cart', $data = $_SESSION['cart']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
