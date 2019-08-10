<?php
namespace App\Service;
use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
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
}
