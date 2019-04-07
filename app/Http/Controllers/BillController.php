<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{

    public function newBill(Request $request)
    {

        $cat_name = $request->category;
        $cat_id = DB::table('expense_categories')->where('cat_name', $cat_name)->value('id');
        $Bill = new Bill();
        $Bill->user_id = auth()->user()->id;
        $Bill->cat_id = $cat_id;
        $Bill->amount = $request->amount;
        $Bill->save();
//        DB::table('bills')->insert(
//            ['user_id' => $user_id, 'cat_id' => $cat_id, 'amount'=> $amount]
//        );
//        $all_cat_slug = DB::table('expense_categories')->orderBy('cat_name')->distinct()->get()->all();
//        return view('home')->with('all_cat_slug',  $all_cat_slug);
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
