<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Supplier;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $p = Product::all();
        if($request->has('keyword') && $request->get('keyword') != "")
        {
          $keyword = $request->get('keyword');
          $p = Product::where('name', 'like' ,'%' . $keyword . '%')->get();
        }
        
        $category = Category::all();
        $sp = Supplier::all();
        return view('admin.product.list-product',['product' => $p,'category' =>$category, 'supplier' =>$sp ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'price' =>'required|numeric',
                'count' => 'required|numeric',
                'description' => 'required',
                'thumbnail' => 'required',
                'categoryId' => 'required',
                'supplierId' => 'required',

            ],
            [
                'name.required' => 'Yêu cầu nhập tên sản phẩm',
                'price.required' => 'Yêu cầu nhập giá sản phẩm',
                'count.required' => 'Yêu cầu nhập số lượng sản phẩm',
                'categoryId.required' => 'Yêu cầu nhập danh mục sản phẩm',
                'supplierId.required' => 'Yêu cầu nhập nhà cung cấp  sản phẩm',
                'description.required' => 'Yêu cầu nhập description',
                'thumbnail.required' => 'Yêu cầu tải ảnh sản phẩm',
                'count.numeric' =>'Yêu cầu nhập số',
                'price.numeric' =>'Yêu cầu nhập số'
            ]
        );

        if($request->hasFile('thumbnail'))
        {
              $file = $request->file('thumbnail');
              $fileName = $file->getClientOriginalName().date('Y-m-d H:i:s');
              $fileName = md5($fileName).'.'.$file->getClientOriginalExtension();
              $file->move(public_path('uploads/product/'), $fileName);
        }

        $p = new Product();
        $p->name = $request->name;
        $p->price = $request->price;
        $p->count = $request->count;
        $p->discount = $request->discount;
        $p->description = $request->description;
        $p->thumbnail = $fileName;
        $p->category_id = $request->categoryId;
        $p->supplier_id = $request->supplierId;
        $p->save();

        Session::flash('sucess','Thêm thành công sản phẩm');
        return redirect('admin/product');
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
        $product = Product::findOrFail($id);
        return view('admin.product.edit-product',['product' => $product]);
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

       $this->validate($request,
            [
                'name' => 'required',
                'price' =>'required|numeric',
                'count' => 'required|numeric',
                'description' => 'required',
                'categoryId' => 'required',
                'supplierId' => 'required'

            ],
            [
                'name.required' => 'Yêu cầu nhập tên sản phẩm',
                'price.required' => 'Yêu cầu nhập giá sản phẩm',
                'count.required' => 'Yêu cầu nhập số lượng sản phẩm',
                'categoryId.required' => 'Yêu cầu nhập danh mục sản phẩm',
                'supplierId.required' => 'Yêu cầu nhập nhà cung cấp  sản phẩm',
                'description.required' => 'Yêu cầu nhập description',
                'count.numeric' => 'Yêu cầu nhập số',
                'price.numeric' => 'Yêu cầu nhập số'
            ]
        );

        $p = Product::findOrFail($id);
        $fileName = $p->thumbnail;

        if($request->hasFile('thumbnail'))
        {
              $file = $request->file('thumbnail');
              $fileName = $file->getClientOriginalName().date('Y-m-d H:i:s');
              $fileName = md5($fileName).'.'.$file->getClientOriginalExtension();
              $file->move(public_path('uploads/product/'), $fileName);
        }

        
        $p->name = $request->name;
        $p->price = $request->price;
        $p->count = $request->count;
        $p->discount = $request->discount;
        $p->description = $request->description;
        $p->thumbnail = $fileName;
        $p->category_id = $request->categoryId;
        $p->supplier_id = $request->supplierId;
        $p->save();

        Session::flash('sucess','Chỉnh sửa '.$p->name .' thành công');
        return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Product::findOrFail($id);
        $name = $p->name;
        $p->delete();
        Session::flash('sucess','Xóa  '.$p->name .' thành công');
        return redirect('admin/product');
    }
}
