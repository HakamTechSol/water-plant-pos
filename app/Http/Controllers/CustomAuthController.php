<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class CustomAuthController extends Controller
{

    // public function index()
    // {

    //     return view('signin');
    // }

    public function customSignin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]
        );
        $user = User::where([
            'email' => $request->email,
            'password' => $request->password,
        ])->first();
        if ($user) {

            Auth::login($user);

            // Putting session And Redirect To Dashboard
            $request->session()->put('user_id', $user->id);
            $request->session()->put('role', $user->role);

            // return session('role');
            return redirect()->route('index');
            exit;
               

            // User Id Checking For Session
            // return session('user');

        }
        // $credentials = $request->only('email', 'password');
        // if(Auth::attempt($credentials)){
        //     return redirect()->intended('index')
        //     ->withSuccess('Signed in');
        // }
        //   if ($credentials['email']=='admin@example.com' && $credentials['password']=='123456'){
        // return redirect()->intended('index')
        //                 ->withSuccess('Signed in');
        // }
        // if (Auth::attempt($credentials)) {
        // return redirect()->intended('index')
        //             ->withSuccess('Signed in');
        // }
        // return redirect('signin')->with('error', 'User email  not found');

        return redirect("/")->withErrors('These credentials do not match our records.');
    }
    public function registration()
    {
        return view('signup');
    }

    public function customSignup(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],
            [
                'name.required' => 'Userame is required',
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',

            ]
        );

        $data = $request->all();
        $check = $this->create($data);

        return redirect("signin")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            // return session('admin_id');
            return view('index');
        }

        return redirect("signin")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        session()->flush();

        return redirect()->route('login')->with('success', 'Logged Out Successfully !');
    }
}
