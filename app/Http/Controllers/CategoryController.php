<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     * Accessible only by Admin via 'manage-category' gate.
     */
    public function index()
    {
        Gate::authorize('manage-category');

        // Load categories with product count for the list view
        $categories = Category::withCount('products')->get();

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        Gate::authorize('manage-category');

        return view('category.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('manage-category');

        // Validate that name is unique in the 'category' table
        $request->validate([
            'name' => 'required|unique:category,name|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        Gate::authorize('manage-category');

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        Gate::authorize('manage-category');

        // Allow same name for the current category record
        $request->validate([
            'name' => 'required|unique:category,name,' . $category->id . '|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        Gate::authorize('manage-category');

        // On delete cascade will handle product deletion if necessary
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
