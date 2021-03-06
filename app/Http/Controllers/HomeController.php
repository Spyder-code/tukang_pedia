<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/');

    }

    public function main()
    {
        if (Auth::id()==1) {
            $visitor = Visitor::all();
            $user = User::all();
            return view('admin.main',compact('visitor','user'));
        }else{
            return redirect()->route('transactiondetail.index');
        }
    }

    public function profile()
    {
        return view('admin.profile');
    }

}
