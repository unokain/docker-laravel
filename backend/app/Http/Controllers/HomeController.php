<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = new User();
        $userName = $users->GetNameById(1);
    
         return view('home.index',compact('userName')); 
    }     //
}
