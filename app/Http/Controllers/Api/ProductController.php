<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::with(['category', 'user'])->get();

            return response()->json([
                'message' => 'Products retrieved successfully',
                'data' => $products,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat mengambil semua produk', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Terjadi kesalahan server',
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|min:3|max:255',
                'quantity' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|exists:category,id',
            ]);

            $validated['user_id'] = Auth::id();

            $product = Product::create($validated);

            Log::info('Menambah data produk', [
                'list' => $product
            ]);

            return response()->json([
                'message' => 'Produk berhasil ditambahkan!!',
                'data' => $product,
            ], 201);
        } catch (\Throwable $e) {
            Log::error('Error saat menambah product', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Terjadi kesalahan server',
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $product = Product::with('category')->find($id);

            if (!$product) {
                return response()->json([
                    'message' => 'Product tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'message' => 'Product retrieved successfully',
                'data' => $product
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Gagal mengambil data produk', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Terjadi kesalahan server',
            ], 500);
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'message' => 'Product tidak ditemukan',
                ], 404);
            }

            $validated = $request->validate([
                'name' => 'required|string|min:3|max:255',
                'quantity' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|exists:category,id',
            ]);

            $product->update($validated);

            Log::info('Mengupdate data produk', [
                'id' => $id,
                'data' => $product
            ]);

            return response()->json([
                'message' => 'Produk berhasil diupdate!!',
                'data' => $product,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat mengupdate product', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Terjadi kesalahan server',
            ], 500);
        }
    }

    public function destroy(int $id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json([
                    'message' => 'Product tidak ditemukan',
                ], 404);
            }

            $product->delete();

            Log::info('Menghapus data produk', [
                'id' => $id
            ]);

            return response()->json([
                'message' => 'Produk berhasil dihapus!!',
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Error saat menghapus product', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'message' => 'Terjadi kesalahan server',
            ], 500);
        }
    }
}
