<?php
namespace App\Service;
use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
class BillService{    
    
    public function store(Bill $bill)
    {
                 
        if($bill->save()){
            $data['message'] = Config::get('constant.200');
            return response()->json($data, 200); 
        }else{
            $data['message'] = Config::get('constant.500');
            return response()->json($data, 500); 
        } 
    }
    public function update(Bill $bill)
    {
         
        if($bill->save()){
            $data['message'] = Config::get('constant.200');
            return response()->json($data, 200); 
        }else{
            $data['message'] = Config::get('constant.500');
            return response()->json($data, 500); 
        } 
        
    }
    public function delete($id)
    { 
        $bill = Bill::find($id); 
        if($bill->delete()){
            $data['message'] = Config::get('constant.200');
            return response()->json($data, 200); 
        }else{
            $data['message'] = Config::get('constant.500');
            return response()->json($data, 500); 
        } 
    }
    
    public function sum_by_cat($user_id, $recent_time, $past_time){
        //sum of all bills in each categories
        $individual_sum_bills = DB::table('expense_categories')
            ->join('bills', 'bills.cat_id', '=', 'expense_categories.id')
            ->select('expense_categories.cat_name', 'expense_categories.id',  DB::raw('SUM(amount) AS total'))
            ->where('user_id', $user_id)
            ->whereMonth('bills.created_at', '>=', $past_time->month) //created after the past date
            ->whereMonth('bills.created_at', '<=', $recent_time->month) //created before the past date
            ->groupBy('expense_categories.id')
            ->get(); 
            if ($individual_sum_bills){
                return $individual_sum_bills;
            }else{
                $data['message'] = Config::get('constant.500');
                return response()->json($data, 500); 
            }
    }
    public function show_by_date($user_id, $recent_time, $past_time){
        return DB::table('expense_categories')
            ->join('bills', 'bills.cat_id', '=', 'expense_categories.id')
            ->where('user_id',$user_id)
            ->whereMonth('bills.created_at', '>=', $past_time->month) //created after the past date
            ->whereMonth('bills.created_at', '<=', $recent_time->month) //created before the past date 
            ->get();
    }
}
