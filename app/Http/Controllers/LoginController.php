<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
class LoginController extends Controller{
    public function index(){
        return view('auth');
    }
    public function login(Request $request){
        $user = User::where('email', '=', $request->input('email'))->first();
        
        if(Hash::check($request->input('password'), $user->password)){
              $id = Auth::user($user);
               
               print_r($id);
        }
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
