<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Payments;

class PayoutController extends Controller
{
    public function show()
    {
    	$requests = Payments::where('success','0')->paginate(20);
    	return view('admin.payouts.requests',compact('requests'));
    }

    public function history()
    {
    	$requests = Payments::where('success','1')->paginate(20);
    	return view('admin.payouts.history',compact('requests'));
    }
}
