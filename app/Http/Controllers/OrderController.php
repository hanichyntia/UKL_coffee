<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\detail_order;
use App\Models\orderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $req)
    {
        // Log the request payload
        $req->validate([
            'customer_name' => 'required|string',
            'order_type' => 'required|string',
            'order_date' => 'required|date',
            'detail_order' => 'required',
            'detail_order.*.coffee_id' => 'required',
            'detail_order.*.price' => 'required',
            'detail_order.*.quantity' => 'required',
        ]);

        $order = orderList::create([
            'customer_name' => $req->customer_name,
            'order_type' => $req->order_type,
            'order_date' => $req->order_date,
        ]);

        foreach ($req->input('detail_order') as $detail) {
            detail_order::create([
                'order_id' => $order->id,
                'coffee_id' => $detail['coffee_id'],
                'price' => $detail['price'],
                'quantity' => $detail['quantity'],
                
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $order,
            'message' => 'Order list has been created'
        ]);
    }
    public function getOrder()
    {
        $orders = OrderList::with('detailorder')->get();

        return response()->json([
            'status' => true,
            'data' => $orders,
            'message' => 'Order list has retrieved'
        ]);
    }
    public function orderId($id){
        $dt_coffee = orderList::with('detailorder')->get();
        $dt=$dt_coffee->where('id', $id)->first();
        return response()->json($dt);
    }
}
