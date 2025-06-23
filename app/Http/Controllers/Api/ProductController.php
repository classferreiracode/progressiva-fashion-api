<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->where('status', true);

        // Filtro por categoria opcional
        if ($request->has('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        // Filtro por featured opcional
        if ($request->has('featured')) {
            $query->where('featured', true);
        }

        $produtos = Cache::remember('home-produtos', 60, fn() => $query->get());

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
