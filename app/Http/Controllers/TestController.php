<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    //
    public function test(){

        // dd('test');
        $user = User::create([
           'name' => 'admin' ,
           'email' => 'admin@email.com' ,
           'password' => Hash::make('123456')
        ]);

    }
}
