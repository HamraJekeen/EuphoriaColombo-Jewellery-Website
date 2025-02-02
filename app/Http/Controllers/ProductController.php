<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        // Eager load the category relationship to optimize queries
        $products = Product::with('category')->paginate(10);
        
        // Return paginated products as resources
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'image' => 'nullable|array',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'is_active' => 'required|boolean',
            'is_featured' => 'nullable|boolean',
            'in_stock' => 'required|integer',
            'on_sale' => 'nullable|boolean',
        ]);

        // Create the product
        $product = Product::create($validated);

        // Return the newly created product as a resource
        return new ProductResource($product);
    }

    /**
     * Display the specified product.
     */
    public function show(string $id)
    {
        // Find the product and load the category relationship
        $product = Product::with('category')->findOrFail($id);
        
        // Return the product as a resource
        return new ProductResource($product);
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        // Validate incoming request data
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $id,
            'image' => 'nullable|array',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'is_active' => 'required|boolean',
            'is_featured' => 'nullable|boolean',
            'in_stock' => 'required|integer',
            'on_sale' => 'nullable|boolean',
        ]);

        // Find the product and update it
        
        $product->update($validated);

        // Return the updated product as a resource
        return new ProductResource($product);
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(string $id)
    {
        // Find the product and delete it
        $product = Product::findOrFail($id);
        $product->delete();

        // Return success response
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
