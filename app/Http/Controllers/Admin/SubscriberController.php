<?php

namespace App\Http\Controllers\Admin;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SubscriberController extends Controller
{
    public function index()
    {
    	$subscribers = Subscriber::latest()->get();
    	return view('admin.subscriber', compact('subscribers'));
    }
    public function destroy($id)
    {
    	$subscriber = subscriber::findOrFail($id);
    	$subscriber->delete();
    	Toastr::success('Subscriber Deleted Successfully', 'Success');
    	return redirect()->back();
    }
}
