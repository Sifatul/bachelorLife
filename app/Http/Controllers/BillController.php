<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use \Illuminate\Support\Facades\Route;
use App\Service\BillService;
use App\Service\CategoryService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection\paginate;

class BillController extends Controller
{
    protected $billservice, $categoryservice;

    public function __construct(BillService $billservice, CategoryService $categoryService)
    {
        $this->billservice = $billservice;
        $this->categoryservice = $categoryService;
    }
    public function index()
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $now = Carbon::now();
            $past_time  = Carbon::now()->startOfMonth()->subMonth();
            $all_cat_slug =  $this->categoryservice->showAll();
            $individual_sum_bills =  $this->billservice->sum_by_cat($user_id, $now, $past_time);
            $each_bill =  $this->billservice->show_by_date($user_id, $now, $past_time)->paginate(10);

            $end_time = date('Y-m-d', strtotime($now));

            return view('bills')
                ->with('all_cat_slug',  $all_cat_slug)
                ->with('each_bill', $each_bill)
                ->with('individual_sum_bills', $individual_sum_bills)
                ->with('start_time', $past_time)
                ->with('end_time', $now->toDateString())
                ->with('title','Dashboard');
        } else {

            return redirect('/login');
        }
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

    public function delete($id)
    {
        $this->billservice->delete($id);
        return redirect('/');
    }

    public function archive()
    {
        $user_id = Auth::id();
        $past =new Carbon('first day of December 2008'); 
        $recent = Carbon::now()->subMonth()->startOfMonth(); 
        
        $all_cat_slug =  $this->categoryservice->showAll();
        $individual_sum_bills =  $this->billservice->sum_archieve_by_cat($user_id, $recent, $past);
        $each_bill =  $this->billservice->show_archive_by_date($user_id, $recent, $past)->paginate(20);
        return view('category')
        ->with('all_cat_slug',  $all_cat_slug)
        ->with('each_bill', $each_bill)
        ->with('individual_sum_bills', $individual_sum_bills)
        ->with('start_time', $past)
        ->with('end_time', $past->toDateString())
        ->withTitle('Archive');

    }
}
