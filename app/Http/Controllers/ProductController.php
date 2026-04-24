<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        \Illuminate\Support\Facades\Gate::authorize('viewAny', Product::class);

        $products = Product::with(['category', 'user'])->get();

        return view('product.index', compact('products'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function create()
    {
        \Illuminate\Support\Facades\Gate::authorize('create', Product::class);

        $users = User::orderBy('name')->get();
        // Fetch categories for the selection dropdown in the form
        $categories = Category::orderBy('name')->get();

        return view('product.create', compact('users', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        \Illuminate\Support\Facades\Gate::authorize('view', $product);

        return view('product.view', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function edit(Product $product)
    {
        \Illuminate\Support\Facades\Gate::authorize('update', $product);

        $users = User::orderBy('name')->get();
        // Fetch categories for the selection dropdown in the form
        $categories = Category::orderBy('name')->get();

        return view('product.edit', compact('product', 'users', 'categories'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        \Illuminate\Support\Facades\Gate::authorize('delete', $product);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }
}
