<?php
namespace App\Service;
use App\Bill;
use Illuminate\Support\Facades\DB;

class CategoryService {

    public function showAll(){
        // all categories of new expenses
       return DB::table('expense_categories')->select('id as cat_id', 'cat_name')->orderBy('cat_name')->distinct()->get()->all();
       
   }
}