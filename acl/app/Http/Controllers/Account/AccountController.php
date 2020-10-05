<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        // list users

        $sub_users = User::where('parent_id', Auth::user()->id)->get();

        return view('account', ['users' => $sub_users] );

    }

    public function createSubUser(Request $request)
    {
        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'parent_id' => Auth::user()->id,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type' => $data['user_type'],
        ]);

        return redirect()->route('home');
    }

    public function showRegistrationSubUserForm()
    {
        return view('auth.registersubuser');
    }

    public function configuration(){
        return view('configuration.home');

    }

    public function dashboard(){
        return view('dashboard.home');
    }

    public function reports(){
        return view('reports.home');
    }

}
