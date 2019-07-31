<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Pagination\Paginator;


class HomeController extends Controller
{


    public function index()
    {
        if (Auth::check()) {

            $req = Request::create('api/show_list/' . Auth::user()->id, 'GET',   []);
            $response = Route::dispatch($req);   
            $pagination_each_bill = new Paginator($response->getData()->each_bill, 10);
            return view('home')
                ->with('all_cat_slug',  $response->getData()->all_cat_slug )
                ->with('each_bill', $pagination_each_bill)
                ->with('individual_sum_bills', $response->getData()->individual_sum_bills)
                ->with('start_time',json_encode($response->getData()->start_time,true))
                ->with('end_time',json_encode($response->getData()->end_time,true));
        } else {
            return view('auth/signin');
        }
    }
}
