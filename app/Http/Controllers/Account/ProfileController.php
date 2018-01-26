<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.account.profile');
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
    public function edit()
    {
        return view('clients.account.change-password');
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        

        $user = User::findOrFail($id);
        $fileName = $user->avatar;
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $fileName = $file->getClientOriginalName().date('Y-m-d H:i:s');
            $fileName = md5($fileName).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/users/'),$fileName);

        }

        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->email = $request->email;
        $user->avatar = $fileName;
        $user->save();

        Session::flash('success_change_profile', 'Profile changed successfully');

        return redirect('profile');
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

     public function changePassword(Request $request, $id)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ],[
            'old_password.required' => 'The Password field is required',
            'password.required' => 'The New Password field is required',
            'password.confirmed' => 'Password Confirmation does not match.',
        ]);

        $user = User::findOrFail($id);
        if(Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            Session::flash('success_change_password', 'Password changed successfully');
            return redirect('profile');
        }
        else {
            Session::flash('failed', 'Password is incorrect');
            return redirect('profile/change-password');
        }

    }
}
