<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->where('status', true);

        // Filtro por categoria opcional
        if ($request->has('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        $produtos = $query->orderBy('created_at', 'desc');

        return response()->json($produtos);
    }

    public function show($slug)
    {
        $produto = Product::with('category')
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        return response()->json($produto);
    }
}
