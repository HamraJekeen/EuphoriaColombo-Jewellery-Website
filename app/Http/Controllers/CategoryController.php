<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve categories with any related models if needed
        $categories = Category::paginate(10);

        // Return paginated categories as a resource collection
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories',
            'description' => 'nullable|string',
        ]);

        // Create the new category with validated data
        $category = Category::create($validated);

        // Return the newly created category as a resource
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the category by ID or fail
        $category = Category::findOrFail($id);

        // Return the category as a resource
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    // Find the category by ID or fail
    $category = Category::findOrFail($id);

    // Validate only the fields being updated
    $validated = $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'slug' => 'sometimes|required|string|unique:categories,slug,' . $id,
        'description' => 'nullable|string',
    ]);

    // Update the category with the validated data
    $category->update($validated);

    // Return the updated category as a resource
    return new CategoryResource($category);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the category by ID or fail
        $category = Category::findOrFail($id);

        // Delete the category
        $category->delete();

        // Return a success message
        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}
