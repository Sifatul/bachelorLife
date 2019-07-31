<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Response;

class BillController extends Controller
{
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
        $Bill->user_id = auth()->user()->id;
        $Bill->cat_id = $request->category_id;
        $Bill->amount = $request->amount;
        $Bill->save();
        return response(200);
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
        $Bill->save();
        return response(200);
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
        // return $id;
        $Bill = Bill::find($id);
        $Bill->delete();
        return response(200);
    }

    public function showList($id)
    {

        $data = [
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->startOfMonth()->subMonth()->toDateString(),
            'user_id' => $id,
        ];
        $request = (object) $data;
        $user_id = $request->user_id;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $now = Carbon::now();


        // all categories of new expenses
        $all_cat_slug = DB::table('expense_categories')->select('id as cat_id', 'cat_name')->orderBy('cat_name')->distinct()->get()->all();
        //sum of all bills in each categories
        $individual_sum_bills = DB::table('expense_categories')
            ->join('bills', 'bills.cat_id', '=', 'expense_categories.id')
            ->select('expense_categories.cat_name', 'expense_categories.id',  DB::raw('SUM(amount) AS total'))
            ->where('user_id', $user_id)
            ->whereMonth('bills.created_at', '=', $start_time->month)
            ->groupBy('expense_categories.id')
            ->get();

        // ->whereYear('bills.created_at', '=', $now->year)
        // return $individual_sum_bills;

        // everyday bill (cat joined with bill)
        $each_bill = DB::table('expense_categories')
            ->join('bills', 'bills.cat_id', '=', 'expense_categories.id')
            ->where('user_id', Auth::user()->id)
            ->whereMonth('bills.created_at', '=', $start_time->month)
            ->take(100)
            ->get();
            // ->simplePaginate(20);
 
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
