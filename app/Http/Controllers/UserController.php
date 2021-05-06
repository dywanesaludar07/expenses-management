<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    public function show(){
        $results = DB::table('users')
        ->select('users.id',
         'users.name','users.email',
         'users.role_id',
         DB::raw('DATE_FORMAT(users.created_at, "%Y-%m-%d") as created_at')
        ,'roles.role_name')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->get();

        if(!empty($results)){
            print(json_encode($results));
        }
    }

    public function edit(Request $request){
        $user_id = $request->input('id');
        $email = $request->input('email');
        $name = $request->input('name');
        $role_id = $request->input('role');

        $user = DB::table('users')->where('id', $user_id)->update(
            array(
                'name' => $name,
                'email' => $email,
                'role_id' => $role_id,
            )
        );  

        if($user){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        }
    }

    public function delete(Request $request){
        $user_id = $request->input('id');
        $user = DB::table('users')->where('id', $user_id)->delete();
        if($user){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        } 
    }

    public function create(Request $request){
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => $request->input('role'),
            'password' => Hash::make('user')
        ]);
        if($user){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        }
    }
}
