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
        
    }
}
