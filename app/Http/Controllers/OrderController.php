<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        $orders = Order::with(['items', 'address', 'user'])->paginate(10);
        return OrderResource::collection($orders);
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'grand_total' => 'nullable|numeric',
            'payment_method' => 'nullable|string|max:255',
            'payment_status' => 'nullable|string|max:255',
            'status' => 'nullable|in:new,processing,shipped,delivered,cancelled',
            'currency' => 'nullable|string|max:10',
            'shipping_amount' => 'nullable|numeric',
            'shipping_method' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $order = Order::create($validated);

        return new OrderResource($order);
    }

    /**
     * Display the specified order.
     */
    public function show($id)
    {
        $order = Order::with(['items', 'address', 'user'])->findOrFail($id);
        return new OrderResource($order);
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'grand_total' => 'nullable|numeric',
            'payment_method' => 'nullable|string|max:255',
            'payment_status' => 'nullable|string|max:255',
            'status' => 'nullable|in:new,processing,shipped,delivered,cancelled',
            'currency' => 'nullable|string|max:10',
            'shipping_amount' => 'nullable|numeric',
            'shipping_method' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        
        $order->update($validated);

        return new OrderResource($order);
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
