<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function store(Request $request){
    	$this->validate($request, array(
    		'email'  => 'required|email|unique:subscribers,email',
    	));

    	$subscriber = new Subscriber;
    	$subscriber->email = $request->email;

    	$subscriber->save();

    	Toastr::success('Subscribed Successfully', 'success');
    	return redirect()->back();
    }
}
