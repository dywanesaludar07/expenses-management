<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
class ExpensesController extends Controller
{
    public function dashboard(){
        if(Auth::user()->role_id == 1){
            $user_id = 0;
            $results = DB::table('expenses')
            ->select(
                DB::raw('SUM(expenses.amount) as amount'),
                 'categories.category_name')
            ->join('categories', 'expenses.category', '=', 'categories.id')
            ->groupBy('expenses.category')
            ->get();
            if(!empty($results)){
                return json_encode($results);
            }
        }else{
            $user_id = Auth::user()->id;
            $results = DB::table('expenses')
            ->select(
                DB::raw('SUM(expenses.amount) as amount'),
                 'categories.category_name')
            ->join('categories', 'expenses.category', '=', 'categories.id')
            ->where('expenses.user_id', $user_id)
            ->groupBy('expenses.category')
            ->get();
            if(!empty($results)){
                return json_encode($results);
            }
        }

    }
    public function show(){
        if(Auth::user()->role_id == 1){
            $user_id = 0;
            $results = DB::table('expenses')
            ->select('categories.category_name as category',
            'expenses.amount','expenses.id',
                DB::raw('DATE_FORMAT(expenses.entry_date, "%Y-%m-%d") as entry_date'),
                DB::raw('DATE_FORMAT(expenses.created_at, "%Y-%m-%d") as created_at'))
            ->join('categories', 'expenses.category', '=', 'categories.id')
            ->get();
        }else{
            $user_id = Auth::user()->id;
            $results = DB::table('expenses')
            ->select('categories.category_name as category',
            'expenses.amount','expenses.id',
                DB::raw('DATE_FORMAT(expenses.entry_date, "%Y-%m-%d") as entry_date'),
                DB::raw('DATE_FORMAT(expenses.created_at, "%Y-%m-%d") as created_at'))
            ->where('user_id', $user_id)
            ->join('categories', 'expenses.category', '=', 'categories.id')
            ->get();
        }
        if(!empty($results)){
            return json_encode($results);
        }
    }
    public function save(Request $request){

        if(Auth::user()->role_id == 1){
            $user_id = 0;
        }else{
            $user_id = Auth::user()->id;
        }
        $expenses = Expenses::create([
            'category' => $request->input('category'),
            'amount' => floatval($request->input('amount')),
            'entry_date' => $request->input('date'),
            'user_id' => $user_id
        ]);
        if($expenses){
            return json_encode(array("0"));
        }else{
            return json_encode(array("1"));
        }
    }

    public function edit(Request $request){
        $exp_id = $request->input('id');
        $category = $request->input('category');
        $amount = $request->input('amount');
        $date = $request->input('date');
        $category = DB::table('expenses')->where('id', $exp_id)->update(
            array(
                'category' => $category,
                'amount' => $amount,
                'entry_date' => $date,
            )
        );  

        if($category){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        }
    }
    public function delete(Request $request){
        $exp_id = $request->input('id');
        $expenses = DB::table('expenses')->where('id', $exp_id)->delete();
        if($expenses){
            print(json_encode(array("0")));
        }else{
            print(json_encode(array("1")));
        } 
    }
}
