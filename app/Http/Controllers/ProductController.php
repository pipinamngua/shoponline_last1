<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SuggestProduct;
use App\Order;
use App\Review;
use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        session_start();
        if(isset($_SESSION['id']))
        {
            $temp = $_SESSION['id'] ." " . strval($id);
            $temp1 = explode(" ", $temp);
            if(sizeof($temp1) == 2)
            {
                if($temp1[0] == $temp1[1])
                {
                    goto quit;
                }

                $data = SuggestProduct::select('*')->where('suggest_product_id','=',$temp1[0])->where('redirect_to_product_id','=',$temp[1])->get();
                if(count($data) == 0)
                {
                    $insert = new SuggestProduct();
                    $insert->suggest_product_id = $temp1[0];
                    $insert->redirect_to_product_id = $temp1[1];
                    $insert->number_redirect = 1;
                    $insert->save();
                    array_shift($temp1);
                    $temp2 = implode(" ",$temp1);
                    $_SESSION['id'] = $temp2;

                }else
                {
                    $number = SuggestProduct::select('*')->where('suggest_product_id','=',$temp1[0],'and','redirect_to_product_id','=',$temp1[1])->value('number_redirect');
                    SuggestProduct::select('*')->where('suggest_product_id','=',$temp1[0],'and','redirect_to_product_id','=',$temp1[1])->update(['number_redirect' => $number +1]);
                    array_shift($temp1);
                    $temp2 = implode(" ",$temp1);
                    $_SESSION['id'] = $temp2;
                }
            }
        }
        else
        {
            $_SESSION['id'] = $id;
        }
        quit:;

        $product = Product::findOrFail($id);

        $suggest_product = SuggestProduct::where('suggest_product_id',$id)
                                            ->orderBy('number_redirect','DESC')
                                            ->take(4)
                                            ->get();                       
        $category = Product::where('id', $id)
                            ->value('category_id');
        $review = Review::where('product_id',$id)->orderBy('updated_at','ASC')->get();
        $productByTagName = Product::where('category_id', $category)
                                    ->orderByRaw("RAND()")
                                    ->take(4)
                                    ->get();
        if(Auth::check())
        {
            $order = Order::where('user_id',Auth::user()->id)->get();
            if(count($order) > 0)
            {
                $averagePrice = 0;
                $averageType = 0;
                $prd_1 =0;
                $prd_2 = 0;
                $prd_3 = 0;
                foreach($order as $key => $value)
                {
                    $nums = count($value->order_detail);
                    foreach ($value->order_detail as $item) {
                        $averagePrice += $item->price;
                        if($item->product->category_id == 1)
                        {
                            $prd_1 +=1;
                        }elseif($item->product->category_id == 2)
                        {
                            $prd_2 +=1;
                        }else
                        {
                            $prd_3 += 1;
                        }
                    }
                }

                $array = ['1'=>$prd_1,'2'=>$prd_2,'3'=>$prd_3];

                $max = max($array);
                $key = array_search($max, $array);
                $prdSuggestByOrder = Product::where('price','>',0.5*$averagePrice/$nums)->where('price','<',1.5*$averagePrice/$nums)->where('category_id',$key)->orderByRaw("RAND()")->take(3)->get();
            }
            else
            {
                $prdSuggestByOrder = Product::orderBy('id','DESC')->take(3)->get();
            }
        }else
        {
            $prdSuggestByOrder = Product::orderBy('id','DESC')->take(3)->get();
        }

        

        
        return view('clients.product.product-detail',[
            'product'=>$product,
            'productByTagName'=>$productByTagName,
            'suggest_product'=> $suggest_product,
            'category' => $category,
            'review' =>$review,
            'prdSuggestByOrder'=>$prdSuggestByOrder
        ]);
    }

}
