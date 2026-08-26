<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class customauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if(!$request->session()->exists('user')){
        //    echo "hellowo";
           
        //     $request->session()->put('user','not login' );
        //    // die();
        //     return redirect('signin')->with('success', 'User has been updated');
        // }       
        // else if($request->session()->get('user')=="not login"){
        //     echo "session is set";
        //     $request->session()->forget('user');
        //   //  die();
        //    // $request->session()->forget('user');
        //     return redirect('signin')->with('success', 'User has been updated');
        // }
        // else{
        //     echo"sess";
        //     die();
        
        // print_r($request->session()->get('user'));
        // echo "hello world";
        return $next($request);}
    // }
}
