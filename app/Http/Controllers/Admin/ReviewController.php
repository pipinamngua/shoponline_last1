<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use Session;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $r = Review::all();
        if($request->has('keyword') && $request->get('keyword') != "")
        {
          $keyword = $request->get('keyword');
          $p = Review::where('email', 'like' ,'%' . $keyword . '%')->get();
        }
        
        return view('admin.review.list-review',['review' => $r]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $r = Review::findOrFail($id);
        $r->delete();
        return redirect('admin/review/show');
    }

     public function daXuLy($id)
    {
        $review = Review::findOrFail($id);
        $review->status = 1;
        $review->save();

        return redirect('admin/review/show');
    }

    public function chuaXuLy($id)
    {
        $review = Review::findOrFail($id);
        $review->status = 0;
        $review->save();

        return redirect('admin/review/show');
    }

}
