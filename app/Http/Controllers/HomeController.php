<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vacation;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $user=$request->user();
        $user_obj = User::find($user->id);
        $admin=false;
        if($user_obj->hasRole("admin")) {
            $admin=true;
        }
        $name_user= $user->name;
        $vacations=Vacation::orderBy('updated_at', 'desc')->get();

        return view('home', compact('vacations','name_user','admin'));
    }
}
