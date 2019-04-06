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

    public function newBill(Request $request)
    {

        // $bill = new bill();
        // $bill->rent = $request->rent;
        // $bill->user_id = auth()->id();
        // $bill->electric_bill = $request->electric_bill;
        // $bill->gas_bill = $request->gas_bill;
        // $bill->bazar_bill = $request->bazar_bill;
        // $bill->bua_bill = $request->bua_bill;
        // $bill->internet_bill = $request->internet_bill;
        // $bill->other_bill = $request->other_bill;
        // $bill->save();

//        return  $request->internet_bill;
    }
    //
}
