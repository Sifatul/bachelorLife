<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{

    public function newBill(Request $request)
    {
  
        $Bill = new Bill();
        $Bill->user_id = auth()->user()->id;
        $Bill->cat_id = $request->category_id;  
        $Bill->amount = $request->amount;
        $Bill->save();
//        DB::table('bills')->insert(
//            ['user_id' => $user_id, 'cat_id' => $cat_id, 'amount'=> $amount]
//        );
//        $all_cat_slug = DB::table('expense_categories')->orderBy('cat_name')->distinct()->get()->all();
//        return view('home')->with('all_cat_slug',  $all_cat_slug);
        return redirect()->action('HomeController@index');
    }
    public function editBill(Request $request){


         
      
       
        $Bill =  Bill::find($request->expense_id); 
        // return  $Bill ;
        $Bill->cat_id =  $request->category_id;
        $Bill->amount = $request->amount; 
        $Bill->save();
 
        return redirect()->action('HomeController@index');

    }
    public function allBills(){
//        $all_cat_slug = DB::table('expense_categories')->orderBy('cat_name')->distinct()->get()->all();
//        $total_bill = DB::table('bills')
//            ->sum('amount');
//        return view('home')

        $all_bills = DB::table('expense_categories')
            ->select('*')
            ->join('bills', 'expense_categories.id', '=', 'bills.cat_id')
            ->where('bills.user_id', 1)
            ->get();
        return view('bills')->with('all_bills',  $all_bills);
    }
}
