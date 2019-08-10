<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use \Illuminate\Support\Facades\Route;
use App\Service\BillService;

class BillController extends Controller
{
    protected $billservice;
    public function index()
    { }

    public function __construct(BillService $billservice)
	{
		$this->billservice = $billservice;
	}
    public function newBill(Request $request)
    {
        
        $Bill = new Bill();
        $Bill->user_id = Auth::user()->id;
        $Bill->cat_id = $request->category_id;
        $Bill->amount = $request->amount;  
        $res = $this->billservice->store($Bill);
        return redirect('/');
    }
    public function update(Request $request)
    {
        $id = $request->expense_id;
        $Bill =  Bill::find($request->expense_id);
        $Bill->cat_id =  $request->category_id;
        $Bill->amount = $request->amount;
        $this->billservice->update($Bill);     
        return redirect()->action('HomeController@index');
    }
    public function allBills()
    {

        $now = Carbon::now();
        // all categories of new expenses
        $all_cat_slug = DB::table('expense_categories')->select('id as cat_id', 'cat_name')->orderBy('cat_name')->distinct()->get()->all();

        $individual_sum_bills = DB::table('expense_categories')
            ->join('bills', 'bills.cat_id', '=', 'expense_categories.id')
            ->select('expense_categories.cat_name', 'expense_categories.id',  DB::raw('SUM(amount) AS total'))

            ->whereMonth('bills.created_at', '<', $now->month)
            ->groupBy('expense_categories.id')
            ->get();
        // ->where('user_id', Auth::user()->id)  


        // ->whereMonth('bills.created_at', '=', $now->month)

        // $all_bills = DB::table('expense_categories')
        //     ->select('*')
        //     ->join('bills', 'expense_categories.id', '=', 'bills.cat_id')
        //     ->where('bills.user_id', auth()->user()->id)
        //     ->whereMonth('bills.created_at', '<', $now->month)
        //     ->simplePaginate(10) ;

        return $individual_sum_bills;

        // return view('bills')
        //     ->with('all_bills',  $all_bills)
        //     ->with('all_cat_slug', $all_cat_slug)
        //     ->with('individual_sum_bills', $individual_sum_bills);

    }
    public function delete($id)
    {
        $this->billservice->delete($id);
        return redirect('/');
    }
}
