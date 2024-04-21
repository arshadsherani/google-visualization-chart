<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;


class SaleController extends Controller
{
    public function index()
    {
        return view('sale');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sale_date' => 'required|date',
            'quantity' => 'required|integer'
        ]);
        $sale = new Sale();
        $sale->name = $request->input('name');
        $sale->sale_date = $request->input('sale_date');
        $sale->quantity = $request->input('quantity');
        $sale->save();

        return redirect()->back()->with('success', 'Sale stored successfully!');
    }
}
