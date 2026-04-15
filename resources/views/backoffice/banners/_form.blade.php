@csrf
@if(isset($method))
    @method($method)
@endif

<div class="space-y-6">
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">Imagem (URL)</label>
        <input type="text" name="image" value="{{ old('image', $banner->image) }}" class="w-full rounded-2xl border border-gray-200 px-4 py-3" required>
    </div>
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">Link</label>
        <input type="text" name="link" value="{{ old('link', $banner->link) }}" class="w-full rounded-2xl border border-gray-200 px-4 py-3">
    </div>
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">Texto alternativo</label>
        <input type="text" name="alt_text" value="{{ old('alt_text', $banner->alt_text) }}" class="w-full rounded-2xl border border-gray-200 px-4 py-3">
    </div>
    <label class="inline-flex items-center gap-2 text-sm text-gray-700">
        <input type="checkbox" name="status" value="1" @checked(old('status', $banner->status ?? true)) class="rounded border-gray-300">
        Ativo
    </label>
</div>

@if($errors->any())
    <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="mt-8 flex items-center gap-3">
    <button type="submit" class="rounded-full bg-[#b6406f] px-5 py-3 text-sm font-semibold text-white">Salvar</button>
    <a href="{{ route('backoffice.banners.index') }}" class="rounded-full border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700">Cancelar</a>
</div>
