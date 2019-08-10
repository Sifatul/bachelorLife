<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Service\BillService; 
use Illuminate\Support\Facades\Config;
use App\Service\CategoryService;

class BillController extends Controller
{
    protected $billservice, $categoryservice;
    
    public function __construct(BillService $billservice, CategoryService $categoryService)
	{
        $this->billservice = $billservice;
        $this->categoryservice = $categoryService;
	}
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        echo "hello world";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $Bill = new Bill();
        $Bill->user_id = $request->user_id;
        $Bill->cat_id = $request->category_id;
        $Bill->amount = $request->amount;   
        $res = $this->billservice->store($Bill);
        return $res;      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($request)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Bill =  Bill::find($request->expense_id);
        $Bill->cat_id =  $request->category_id;
        $Bill->amount = $request->amount;
        return $this->billservice->update($Bill);
     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy($id)
    {

        // return $id;
        // $Bill = Bill::find($id);
        // $Bill->delete();
    }

    public function delete($id)
    {        
        return $this->billservice->delete($id);
    }

  
    public function showList($user_id)
    {
 
       
        $start_time = Carbon::now();
        $end_time  = Carbon::now()->startOfMonth()->subMonth()->toDateString();

        

    

        // all categories of new expenses
        $all_cat_slug =  $this->categoryservice->showAll();

        $individual_sum_bills =  $this->billservice->sum_by_cat($user_id,$start_time, $end_time);
  
         
        $each_bill =  $this->billservice->sum_by_cat($user_id,$start_time, $end_time);
            // ->simplePaginate(20);
            // return $individual_sum_bills;
            return  response()->json([
                'all_cat_slug'=>$all_cat_slug,
                'individual_sum_bills'=>$individual_sum_bills,
                'each_bill'=>$each_bill,
                'start_time'=>$start_time,
                'end_time'=>$end_time
            ]);
            // return $output;
            
        // response( $output, 200);
        // 
        
    }
}
