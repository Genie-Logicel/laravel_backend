<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    // get all expenses
    function getAllExpenses(Request $request)
    {
        $date_begin = $request->date_begin;
        $date_end = $request->date_end;

        $data = Expense::
        when($date_begin != null && $date_end , function($query) use ($date_begin,$date_end){
            return $query->whereBetween('created_at', [$date_begin, $date_end]);
        })
        ->get();
        return response()->json($data);
    }

    // add expenses
    public function add(Request $request)
    {
        $label = $request->label;
        $value = $request->amount;
        $cat_id = $request->cat_id;

        if (Expense::create(['label' => $label, 'value' => $value, 'cat_id' => $cat_id])) {
            return response()->json(['message' => 'Expense added successfully'],200);
        } else {
            return response()->json(['message' => 'Expense not added successfully'],500);
        }
        
    }

}
