<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        // echo "home controller" ;
        // echo Auth::check();
        // exit;
        if (Auth::check()) {

            $req = Request::create('api/show_list/' . Auth::user()->id, 'GET',   []);
            $response = Route::dispatch($req);   
            // return json_encode($response->getData()->start_time->date,true);
            $pagination_each_bill = new Paginator($response->getData()->each_bill, 10);
            $start_time = date('Y-m-d',strtotime($response->getData()->start_time->date));
             
            return view('home')
                ->with('all_cat_slug',  $response->getData()->all_cat_slug )
                ->with('each_bill', $pagination_each_bill)
                ->with('individual_sum_bills', $response->getData()->individual_sum_bills)
                ->with('start_time',$start_time)
                ->with('end_time',$response->getData()->end_time);
        } else {

            return view('auth/signin');
        }
    }
}
