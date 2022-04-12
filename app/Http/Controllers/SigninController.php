<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SigninController extends Controller
{
    //

    public function signin()
    {
        // $user = Auth::user();
        // // dd($user);

        //  if ($user->role =='admin'){
        //      return view('admin.layouts.home');
        //  }else if($user->role =='teacher'){
        //     return view('admin.teacher.home');
        // }
        //  else if($user->role =='student'){
        //      dd('student');
        //  }

        return view('signin');

        
    }
}
