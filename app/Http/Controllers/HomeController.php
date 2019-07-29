<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bill;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $now = Carbon::now();


            // all categories of new expenses
            $all_cat_slug = DB::table('expense_categories')->select('id as cat_id', 'cat_name')->orderBy('cat_name')->distinct()->get()->all();
            //sum of all bills in each categories
            $individual_sum_bills = DB::table('expense_categories')
                ->join('bills', 'bills.cat_id', '=', 'expense_categories.id')
                ->select('expense_categories.cat_name', 'expense_categories.id',  DB::raw('SUM(amount) AS total'))
                ->where('user_id', Auth::user()->id)                
                ->whereYear('bills.created_at', '=', $now->year)
                ->whereMonth('bills.created_at', '=', $now->month)
                ->groupBy('expense_categories.id')
                ->get();
            // return $individual_sum_bills;

            // everyday bill (cat joined with bill)
            $each_bill = DB::table('expense_categories')
                ->join('bills', 'bills.cat_id', '=', 'expense_categories.id')
                ->where('user_id', Auth::user()->id)
                ->whereYear('bills.created_at', '=', $now->year)
                ->whereMonth('bills.created_at', '=', $now->month)
                ->get();

            // $each_bill = Bill::take(2)->get()->where('user_id', Auth::user()->id)->first();
            // return $each_bill;

            return view('home')
                ->with('all_cat_slug', $all_cat_slug)
                ->with('each_bill',  $each_bill)
                ->with('individual_sum_bills', $individual_sum_bills);
        } else {
            return view('auth/signin');
        }
    }
}
