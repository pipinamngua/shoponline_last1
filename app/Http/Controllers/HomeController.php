<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Supplier;
use App\Cart;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('home',['p'=>$product]);
        //return view('home',['p'=>$product,'category'=>$category,'supplier'=>$supplier]);
    }

    public function none(){
        echo 'ahihi';
    }

    public function GetSearch(Request $req){
         $product = Product::where('name','like','%'.$req->key.'%')->get();
         //foreach ($product as $p) echo $p->name;
         return view('search',compact('product'));
    }

    public function GetCategory($cat){
        $p = Product::where('category_id',$cat)->get();
        //foreach ($p as $pro) echo $pro->name;
        return view('category',compact('p'));
    }

    public function GetSupplier($sup){
        $p = Product::where('supplier_id',$sup)->get() ;
        return view('supplier',compact('p'));
    }

    public function GetSort($sort){
        $p = Product::orderBy('price',$sort)->get();
        return view('Sort',compact('p'));
    }

    //Huế start
    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);

        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckout(){
        return view('pay');
    }

    public function postCheckout(Request $req){
        if(Session::has('cart'))
        {
            $cart = Session::get('cart');

            $order = new Order();
            $order->name = $req->name;
            $order->gender = $req->gender;
            $order->email = $req->email;
            $order->address = $req->address;
            $order->phone = $req->phone;
            $order->date_order = date('Y-m-d');
            $order->total = $cart->totalPrice;
            $order->payment = $req->payment_method;
            $order->status = 0;
            $order->save();

            foreach ($cart->items as $key => $value) {
                $bill_detail = new OrderDetail();
                $bill_detail->order_id = $order->id;
                $bill_detail->product_id = $key;
                $bill_detail->quantity = $value['count'];
                $bill_detail->price = ($value['price']/$value['count']);
                $bill_detail->save();
            }
            if($order->gender == "nam")
                $name_custom = "Ông ".$order->name;
            else
                $name_custom = "Bà ".$order->name;
            $mail = $order->email;
            Session::forget('cart');

            //Gửi email đến khách hàng
            
            $contents = '<!DOCTYPE html>
                    <html>
                    <head>
                        <title>THÔNG BÁO ĐƠN HÀNG</title>
                        <meta charset="utf-8"/>
                    </head>
                    <body>
                        <h1>Xin chào . Chúc mừng bạn đã đặt hàng thành công</h1>
                        <br>
                        <h3>Thông tin chi tiết đơn hàng</h3>
                        <table>
                            <tr>
                                <td style="font-weight: bold;">Họ tên: </td>
                                <td>'.$order->name.'</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Giới tính: </td>
                                <td>'.$order->gender.'</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Địa chỉ nhận hàng: </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Số điện thoại: </td>
                                <td>'.$order->address.'</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Tổng tiền: </td>
                                <td>'. $order->total.'</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Ngày đặt hàng: </td>
                                <td>'.$order->date_order.'</td>
                            </tr>
                        </table>
                    </body>
                    </html>';

            /*Mail::send(
                'mail', 
                array('name'=>$order->name,'email'=>$order->email, 'content'=>$contents),
                function($message){
                    $message->to('nhakhoahoccuatuonglai@gmail.com', 'admin')
                            ->subject('Thông tin đặt hàng');
                }
            );*/
            //End send mail
            return redirect()->back()->with('thongbao','Đặt hàng thành công');
        }
        else
            return redirect()->back()->with('thongbao','Không có sản phẩm nào trong giỏ hàng');

    }
    //Huế end
}
