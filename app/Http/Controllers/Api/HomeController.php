<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\{Banner, Product, Feed, Testimonial, Faq};

class HomeController extends Controller
{
    public function index()
    {
        return response()->json([
            'banners' => Banner::where('status', true)->get(),
            'destaques' => Cache::remember('destaques', 3600, fn() => Product::where('featured', true)->where('status', true)->get()),
            'produtos' => Cache::remember('produtos', 3600, fn() => Product::where('status', true)->get()),
            'feed' => Feed::where('status', true)->get(),
            'testimonials' => Testimonial::where('status', true)->get(),
            'faqs' => Faq::where('status', true)->get()
        ]);
    }
}
