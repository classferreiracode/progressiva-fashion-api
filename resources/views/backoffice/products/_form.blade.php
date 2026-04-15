@csrf
@if(isset($method))
    @method($method)
@endif

<div class="grid gap-6 lg:grid-cols-2">
    <div class="space-y-6">
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700">Titulo</label>
            <input type="text" name="title" value="{{ old('title', $product->title) }}" class="w-full rounded-2xl border border-gray-200 px-4 py-3" required>
        </div>
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700">Categoria</label>
            <select name="category_id" class="w-full rounded-2xl border border-gray-200 px-4 py-3" required>
                <option value="">Selecione</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700">Imagem (URL)</label>
            <input type="text" name="image" value="{{ old('image', $product->image) }}" class="w-full rounded-2xl border border-gray-200 px-4 py-3">
        </div>
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700">Link externo</label>
            <input type="url" name="external_link" value="{{ old('external_link', $product->external_link) }}" class="w-full rounded-2xl border border-gray-200 px-4 py-3" required>
        </div>
    </div>

    <div class="space-y-6">
        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-700">Preco regular</label>
                <input type="number" step="0.01" name="price_regular" value="{{ old('price_regular', $product->price_regular) }}" class="w-full rounded-2xl border border-gray-200 px-4 py-3" required>
            </div>
            <div>
                <label class="mb-2 block text-sm font-medium text-gray-700">Preco promocional</label>
                <input type="number" step="0.01" name="price_sale" value="{{ old('price_sale', $product->price_sale) }}" class="w-full rounded-2xl border border-gray-200 px-4 py-3">
            </div>
        </div>
        <div class="flex gap-6">
            <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                <input type="checkbox" name="featured" value="1" @checked(old('featured', $product->featured)) class="rounded border-gray-300">
                Destaque
            </label>
            <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                <input type="checkbox" name="status" value="1" @checked(old('status', $product->status ?? true)) class="rounded border-gray-300">
                Ativo
            </label>
        </div>
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700">Descricao</label>
            <textarea name="description" rows="10" class="w-full rounded-2xl border border-gray-200 px-4 py-3" required>{{ old('description', $product->description) }}</textarea>
        </div>
    </div>
</div>

@if($errors->any())
    <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
        <ul class="space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mt-8 flex items-center gap-3">
    <button type="submit" class="rounded-full bg-[#b6406f] px-5 py-3 text-sm font-semibold text-white">Salvar</button>
    <a href="{{ route('backoffice.products.index') }}" class="rounded-full border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700">Cancelar</a>
</div>
