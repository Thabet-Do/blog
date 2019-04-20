<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('home');
    }

    public function profile()
    {
        return view('profile');
    }
    public function control()
    {
        if (Auth::user()->role == 3)
        {
            return redirect("/");
        }
        $users = DB::table('users')->get();
        return view('control',compact('users'));
    }
    public function updateRole(Request $request,User $user)
    {
        $user->update($request->all());
        return redirect("/control");
    }

    public function updateUser(Request $request,User $user)
    {
        $user->update($request->all());
        return redirect("/full-control");
    }

    public function fullControl(Request $request)
    {
        if (Auth::user()->role > 1 )
        {
            return redirect("/");
        }
        $users = DB::table('users')->get();
        return view('full-control',compact('users'));
    }
    public function deleteUser(Request $request,User $user)
    {
        $user->delete();
        return redirect("/full-control");
    }
    public function editUser(Request $request,User $user)
    {
        $user->delete();
        return redirect("/full-control");
    }
}
