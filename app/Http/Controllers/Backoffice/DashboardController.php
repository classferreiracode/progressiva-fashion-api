<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Contato;
use App\Models\Faq;
use App\Models\Product;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backoffice.dashboard', [
            'stats' => [
                'products' => Product::count(),
                'featuredProducts' => Product::where('featured', true)->count(),
                'banners' => Banner::count(),
                'faqs' => Faq::count(),
                'testimonials' => Testimonial::count(),
                'contacts' => Contato::count(),
            ],
            'recentContacts' => Contato::latest()->take(5)->get(),
            'recentProducts' => Product::latest()->take(5)->get(),
        ]);
    }
}
