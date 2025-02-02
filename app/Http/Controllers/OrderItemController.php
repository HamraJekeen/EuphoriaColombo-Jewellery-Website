<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Http\Resources\OrderItemResource;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $orderId = $request->query('order_id');

    if ($orderId) {
        $orderItems = OrderItem::with('product')->where('order_id', $orderId)->get();
    } else {
        $orderItems = OrderItem::with('product')->get();
    }

    return response()->json(['data' => $orderItems]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'unit_amount' => 'nullable|numeric',
            'total_amount' => 'nullable|numeric',
        ]);

        $orderItem = OrderItem::create($validated);

        return new OrderItemResource($orderItem);
    }

        // public function store(Request $request)
    // {
    // $validated = $request->validate([
    //     'product_id' => 'required|exists:products,id',
    //     'quantity' => 'required|integer|min:1',
    //     'order_id' => 'nullable|exists:orders,id', // Optional, can be null for new orders
    // ]);

    // $orderId = $validated['order_id'] ?? Order::create(['user_id' => auth()->id()])->id;

    // $product = Product::find($validated['product_id']);

    // $orderItem = OrderItem::updateOrCreate(
    //     [
    //         'order_id' => $orderId,
    //         'product_id' => $validated['product_id']
    //     ],
    //     [
    //         'quantity' => $validated['quantity'],
    //         'unit_amount' => $product->price,
    //         'total_amount' => $validated['quantity'] * $product->price,
    //     ]
    // );

    // return response()->json(['message' => 'Product added to cart!', 'order_item' => $orderItem]);
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $orderItem = OrderItem::with(['order', 'product'])->findOrFail($id);
        return new OrderItemResource($orderItem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $validated = $request->validate([
            'order_id' => 'nullable|exists:orders,id',
            'product_id' => 'nullable|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
            'unit_amount' => 'nullable|numeric',
            'total_amount' => 'nullable|numeric',
        ]);

        
        $orderItem->update($validated);

        return new OrderItemResource($orderItem);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->delete();

        return response()->json(['message' => 'Order item deleted successfully'], 200);
    }
}
