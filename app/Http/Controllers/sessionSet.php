<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Models\sessionSet;


class sessionSet extends Controller
{
    function getSession(Request $request){
        $request->session()->put('product',$request->input('product'));
        // echo session('product'); -> to get session data;
        // return redirect('profile');
    }
}
