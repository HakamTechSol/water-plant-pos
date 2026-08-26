<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usercontroller extends Controller
{
    public function index()
    {
        $users = User::all();

        $user = "not edit";

        return view('user-account-list', ['users' => $users, 'user' => $user]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required| email',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required|in:"Sub-Admin", "Admin"',
        ]);
        $users = new User();
        $users->name = $request->input('username');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->role = $request->input('role');
        $users->save();
        return redirect()->route('user-account-list')->with('success', 'User has been created successfully.');
    }
    public function edit($id)
    {
        $user1 = User::find($id);

        return view('edit-user-account', ['user1' => $user1]);
    }
    public function edit2($id)
    {
        $employee = User::find($id);
        return view('profile', ['employee' => $employee]);
    }
    public function updatebyuser(Request $request, $id)
    {
        $request->validate([
            'FName' => 'required',
            'LName' => 'required',
            'phone' => 'required',
            'Email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::find($id);
        // if ($request->hasFile('profileimg')) {
        //     $name = $request->file('profileimg')->getClientOriginalName();
        //     $size = $request->file('profileimg')->getSize();

        //     // $path = $request->file('profileimg')->storeAs('product_img/', $name, 'public');
        //     $path = $request->file('profileimg')->storeAs('userprofile/', $name, 'public');
        //     $user->profile_img = $name;
        // }
        $user->First_name = $request->input('FName');
        $user->Last_name = $request->input('LName');
        $user->phone = $request->input('phone');
        $user->email = $request->input('Email');
        $user->password = $request->input('password');
        $user->name = $request->input('username');
        $user->update();
        $request->session()->put('user', $user);
        return redirect()->back()->with('success', 'Profile Updated');
    }
    // public function updateuserimg(Request $request, $id)
    // {
    //     $request->validate([
    //         'profileimg' => 'required',
    //     ]);
    //     $name = $request->file('profileimg')->getClientOriginalName();
    //     $size = $request->file('profileimg')->getSize();

    //     $path = $request->file('profileimg')->storeAs('user_profile/', $name, 'public');
    //     $user = User::find($id);
    //     $user->profile_img = $name;
    //     $user->update();
    //     return redirect()->back()->with('success', 'Profile picture is updated');
    // }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:"Sub-Admin", "Admin"',
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->update();
        return redirect()->back()->with('success', 'User has been updated');
    }
    public function destroy($id)
    {
        try {
            $user = DB::delete('delete from users where id = ?', [$id]);
            return response()->json([
                'success' => 'Record  deleted successfully!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'unsuccess' => 'Record not deleted successfully!',
            ]);
        }
    }
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $req->input('email'))->get();
        if ($user) {
            if ($user[0]->password == $req->password) {
                $req->session()->put('admin_id', $user[0]->id);

                // return session('admin_id');
                // return redirect('/index');
            } else {
                return redirect('signin')->with('error', 'User  password is incorrect');
            }
        } else {
            return redirect('signin')->with('error', 'User email  not found');
        }
    }
}
