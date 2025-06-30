<?php

namespace App\Http\Controllers\Dash;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    protected $model;
    public function __construct()
    {
        $this->model = new Product();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->model->all();
        return view('dash.productsView', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dash.createProductsView');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'price_regular' => 'required|decimal:0,2',
            'price_sale' => 'nullable|decimal:0,2',
            'external_link' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|min:10|max:1000',
        ], [
            'title.required' => 'O título é obrigatório.',
            'price_regular.required' => 'O preço regular é obrigatório.',
            'price_regular.decimal' => 'O preço regular deve ser um número decimal válido.',
            'price_sale.decimal' => 'O preço promocional deve ser um número decimal válido.',
            'external_link.required' => 'O link de compra é obrigatório.',
            'external_link.string' => 'O link de compra deve ser um texto.',
            'image.image' => 'A imagem deve ser um arquivo de imagem válido (jpeg, png, jpg, gif).',
            'image.max' => 'A imagem não pode exceder 2MB.',
            'description.string' => 'A descrição deve ser um texto.',
            'description.min' => 'A descrição deve ter pelo menos 10 caracteres.',
            'description.max' => 'A descrição não pode exceder 1000 caracteres.',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $data['slug'] = Str::slug($data['title'], '-');

        $product = $this->model->create($data);

        return redirect()->route('products.index')->with('success', 'Produto adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
