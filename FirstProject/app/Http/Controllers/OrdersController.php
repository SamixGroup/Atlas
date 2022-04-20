<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function uploadOrder(Request $req){
        $req->validate([
            'file' => 'required|mimes:jpg,png,jpeg,pdf,gif',
        ]);

        $fileName = time() . '.' . $req->file->extension();
        $req->file->move(public_path('uploads'), $fileName);
        $order = new orders();
        $order->status = 0;
        $order->subject = $req->input('subject');
        $order->file = $fileName;
        $order->sms = $req->input('sms');

        $order->email = Auth::user()->email;
        $order->client_name = Auth::user()->name;
        $order->save();

    }

    public function allOrders(){
        $orders = new orders();
        return view('admin.orders', ['orders' => Photos::all->paginate(5)]);

    }

    public function orderVerify($id){
        $order = orders::find($id);
        if ($order->status_verify == 1){
            $order->status_verify = 0;
        }
        else{
            $order->status_verify = 1;
        }
        $order->save();
        return redirect()->route('allData');
    }
}
