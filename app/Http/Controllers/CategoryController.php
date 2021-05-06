<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller{

    
    public function showCategories(){
        $result = DB::table('categories')->select('category','id')->get();
        if(!empty($result)){
            print(json_encode($result));
        }
    }

    public function show(){
        $result = DB::table('categories')->select('category_name','category_description',
        'id',
        DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_at')
        )->get();
        if(!empty($result)){
            print(json_encode($result));
        }
    }
    public function create(Request $request){
        $category = Category::create([
            'category_name' => $request->input('name'),
            'category_description' => $request->input('description'),
        ]);

        if($category){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        }
    }

    public function edit(Request $request){
        $cat_id = $request->input('id');
        $desc = $request->input('desc');
        $name = $request->input('name');
        $category = DB::table('categories')->where('id', $cat_id)->update(
            array(
                'category_description' => $desc,
                'category_name' => $name
            )
        );  

        if($category){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        }
    }
    public function delete(Request $request){
        $cat_id = $request->input('id');
        $category = DB::table('categories')->where('id', $cat_id)->delete();
        if($category){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        } 
    }
}
