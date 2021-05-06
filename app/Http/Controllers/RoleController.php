<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function change(Request $request){
        $user_id = Auth::user()->id;
        $new_pass = $request->input('new_pass');
        $role = DB::table('users')->where('id', $user_id)->update(
            array(
                'password' => Hash::make($new_pass),
                'id' => $user_id
            )
        );  
        if($role){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        }

    }
    public function create(Request $request)
    {
        $role = Role::create([
            'role_name' => $request->input('name'),
            'role_description' => $request->input('description'),
        ]);

        if($role){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        }
    }

    public function show(){
        $result = DB::table('roles')->select('role_name','role_description',
        'id',
        DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_at')
        )
        ->groupBy('role_name')
        ->get();
        if(!empty($result)){
            print(json_encode($result));
        }
    }

    public function showRoles(){
        $result = DB::table('roles')->select('role_name','id')
        ->groupBy('role_name')
        ->get();
        if(!empty($result)){
            print(json_encode($result));
        }
    }
    public function edit(Request $request){
        $role_id = $request->input('id');
        $description = $request->input('description');
        $name = $request->input('name');
        $role = DB::table('roles')->where('id', $role_id)->update(
            array(
                'role_description' => $description,
                'role_name' => $name
            )
        );  

        if($role){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        }
    }

    public function delete(Request $request){
        $role_id = $request->input('id');
        $role = DB::table('roles')->where('id', $role_id)->delete();
        if($role){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        } 
    }
}
