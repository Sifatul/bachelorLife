<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Service\CategoryService;
use Illuminate\Support\Carbon;
use App\Service\BillService;

class HomeController extends Controller
{
    protected $billservice, $categoryservice;
    
    public function __construct(BillService $billservice, CategoryService $categoryService)
	{
        $this->billservice = $billservice;
        $this->categoryservice = $categoryService;
	}
    public function index()
    {

        
        // echo "home controller" ;
// dd( $this->categoryservice->showAll());
//         // echo Auth::check();
//         exit;
        if (Auth::check()) {
            $user_id = Auth::id();

            $start_time = Carbon::now();
        $end_time  = Carbon::now()->startOfMonth()->subMonth()->toDateString();

        // all categories of new expenses
        $all_cat_slug =  $this->categoryservice->showAll();

        $individual_sum_bills =  $this->billservice->sum_by_cat($user_id,$start_time, $end_time);
  
         
        $each_bill =  $this->billservice->sum_by_cat($user_id,$start_time, $end_time);
            // ->simplePaginate(20);
            $pagination_each_bill = new Paginator($each_bill, 10);
            $start_time = date('Y-m-d',strtotime(Carbon::now()));
             
            return view('home')
                ->with('all_cat_slug',  $all_cat_slug )
                ->with('each_bill', $pagination_each_bill)
                ->with('individual_sum_bills', $individual_sum_bills)
                ->with('start_time',$start_time)
                ->with('end_time',$end_time);
        } else {

            return redirect('/login');
        }
    }
}
