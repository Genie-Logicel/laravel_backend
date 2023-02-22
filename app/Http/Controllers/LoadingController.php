<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoadingController extends Controller
{
    public function index()
    {
        $data = User::get();
        return view('loading' , [
            "Users" => $data
        ]);
    }
}
