<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(20);

        return view('backoffice.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('backoffice.products.create', [
            'product' => new Product(),
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeUniqueSlug($data['title']);
        $data['featured'] = $request->boolean('featured');
        $data['status'] = $request->boolean('status', true);
        $data['price_sale'] = $data['price_sale'] ?? $data['price_regular'];

        Product::create($data);
        Cache::flush();

        return redirect()->route('backoffice.products.index')->with('success', 'Produto criado com sucesso.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('backoffice.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validateData($request, $product);
        $data['slug'] = $this->makeUniqueSlug($data['title'], $product->id);
        $data['featured'] = $request->boolean('featured');
        $data['status'] = $request->boolean('status');
        $data['price_sale'] = $data['price_sale'] ?? $data['price_regular'];

        $product->update($data);
        Cache::flush();

        return redirect()->route('backoffice.products.index')->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        Cache::flush();

        return redirect()->route('backoffice.products.index')->with('success', 'Produto removido com sucesso.');
    }

    protected function validateData(Request $request, ?Product $product = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['required', 'string'],
            'price_regular' => ['required', 'numeric'],
            'price_sale' => ['nullable', 'numeric'],
            'external_link' => ['required', 'url'],
            'image' => ['nullable', 'string', 'max:255'],
        ]);
    }

    protected function makeUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (
            Product::where('slug', $slug)
                ->when($ignoreId, fn($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}
