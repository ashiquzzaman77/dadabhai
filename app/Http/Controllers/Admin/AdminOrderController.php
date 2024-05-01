<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //Admin Order Details
    public function AdminOrderDetails($id)
    {
        $order = Order::find($id);
        return view('admin.pages.order.order_details',compact('order'));
    }
}
