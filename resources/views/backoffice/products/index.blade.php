<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-extrabold uppercase tracking-[0.24em] text-[#782744]">Backoffice</p>
                <h2 class="text-2xl font-semibold text-[#1f1720]">Produtos</h2>
            </div>
            <a href="{{ route('backoffice.products.create') }}" class="rounded-full bg-[#b6406f] px-5 py-3 text-sm font-semibold text-white">Novo produto</a>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-3xl border border-[#ead7df] bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#fff8f1]">
                        <tr class="text-left text-xs uppercase tracking-[0.18em] text-gray-500">
                            <th class="px-6 py-4">Produto</th>
                            <th class="px-6 py-4">Categoria</th>
                            <th class="px-6 py-4">Preco</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @foreach($products as $product)
                            <tr>
                                <td class="px-6 py-4">
                                    <p class="font-semibold text-[#1f1720]">{{ $product->title }}</p>
                                    <p class="text-xs text-gray-500">{{ $product->slug }}</p>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ optional($product->category)->name }}</td>
                                <td class="px-6 py-4 text-gray-600">
                                    R$ {{ number_format((float) $product->price_sale, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="rounded-full px-3 py-1 text-xs {{ $product->status ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">
                                        {{ $product->status ? 'Ativo' : 'Inativo' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <a href="{{ route('backoffice.products.edit', $product) }}" class="rounded-full border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-700">Editar</a>
                                        <form method="POST" action="{{ route('backoffice.products.destroy', $product) }}" onsubmit="return confirm('Remover este produto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-full border border-red-200 px-3 py-2 text-xs font-semibold text-red-600">Excluir</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-6">{{ $products->links() }}</div>
    </div>
</x-app-layout>
