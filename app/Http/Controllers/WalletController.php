<?php

namespace App\Http\Controllers;

Use Illuminate\Support\Facades\DB;
use App\bill;
use App\fixedExpenses;
use App\expenseCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{

    public function index()
    {
//         $all_cat = DB::table("expense_cats")->select('*')
//             ->whereNOTIn('id', function ($query) {
//                 $query->select('cat_id')->from('fixed_expenses')->where('user_id', Auth::id());
//             })
//             ->get()->toArray();

// //        return $all_cat;
//         return view('bills')->with('all_cat', $all_cat);
    }


    //
}
