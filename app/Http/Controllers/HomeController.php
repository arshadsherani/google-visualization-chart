<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {

        //$sales = Sale::where(['id','=',1])->first();
        
        $salesData = Sale::select(DB::raw("MONTH(sale_date) AS SaleMonth"), DB::raw('COUNT(id) AS TotalSalesCount'), DB::raw('SUM(quantity) AS TotalQuantitySold'), DB::raw('AVG(quantity) AS AverageQuantityPerSale'))
        ->whereYear('sale_date', '-', DB::raw("YEAR(CURRENT_DATE - INTERVAL 1 YEAR)"))
        ->groupBy(DB::raw("MONTH(sale_date)"))
        ->orderBy(DB::raw("MONTH(sale_date)"))
        ->get();

        return view('welcome')->with(['salesData' => $salesData]);;
    }

}
