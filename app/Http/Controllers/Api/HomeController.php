<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Banner, Product, Feed, Testimonial, Faq};

class HomeController extends Controller
{
    public function index()
    {
        return response()->json([
            'banners' => Banner::where('status', true)->get(),
            'destaques' => Product::where('featured', true)->where('status', true)->get(),
            'produtos' => Product::where('status', true)->limit(12)->get(),
            'feed' => Feed::where('status', true)->get(),
            'testimonials' => Testimonial::where('status', true)->get(),
            'faqs' => Faq::where('status', true)->get()
        ]);
    }
}
