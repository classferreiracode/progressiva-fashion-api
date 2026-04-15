@csrf
@if(isset($method))
    @method($method)
@endif
<div class="space-y-6">
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">Nome</label>
        <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="w-full rounded-2xl border border-gray-200 px-4 py-3" required>
    </div>
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">Foto (URL)</label>
        <input type="text" name="photo" value="{{ old('photo', $testimonial->photo) }}" class="w-full rounded-2xl border border-gray-200 px-4 py-3">
    </div>
    <div>
        <label class="mb-2 block text-sm font-medium text-gray-700">Depoimento</label>
        <textarea name="content" rows="8" class="w-full rounded-2xl border border-gray-200 px-4 py-3" required>{{ old('content', $testimonial->content) }}</textarea>
    </div>
    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <label class="mb-2 block text-sm font-medium text-gray-700">Nota</label>
            <input type="number" min="1" max="5" name="rating" value="{{ old('rating', $testimonial->rating ?: 5) }}" class="w-full rounded-2xl border border-gray-200 px-4 py-3" required>
        </div>
        <div class="flex items-end">
            <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                <input type="checkbox" name="status" value="1" @checked(old('status', $testimonial->status ?? true)) class="rounded border-gray-300">
                Ativo
            </label>
        </div>
    </div>
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
    <a href="{{ route('backoffice.testimonials.index') }}" class="rounded-full border border-gray-200 px-5 py-3 text-sm font-semibold text-gray-700">Cancelar</a>
</div>
