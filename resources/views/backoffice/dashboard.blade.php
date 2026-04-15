<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-xs font-extrabold uppercase tracking-[0.24em] text-[#782744]">Backoffice</p>
                <h2 class="text-2xl font-semibold text-[#1f1720]">Gestao do site</h2>
            </div>
            <a href="{{ route('backoffice.products.create') }}" class="rounded-full bg-[#b6406f] px-5 py-3 text-sm font-semibold text-white">
                Novo produto
            </a>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl space-y-8 px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid gap-4 md:grid-cols-3 xl:grid-cols-6">
            <div class="rounded-3xl border border-[#ead7df] bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Produtos</p>
                <p class="mt-2 text-3xl font-bold text-[#1f1720]">{{ $stats['products'] }}</p>
            </div>
            <div class="rounded-3xl border border-[#ead7df] bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Destaques</p>
                <p class="mt-2 text-3xl font-bold text-[#1f1720]">{{ $stats['featuredProducts'] }}</p>
            </div>
            <div class="rounded-3xl border border-[#ead7df] bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Banners</p>
                <p class="mt-2 text-3xl font-bold text-[#1f1720]">{{ $stats['banners'] }}</p>
            </div>
            <div class="rounded-3xl border border-[#ead7df] bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">FAQs</p>
                <p class="mt-2 text-3xl font-bold text-[#1f1720]">{{ $stats['faqs'] }}</p>
            </div>
            <div class="rounded-3xl border border-[#ead7df] bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Depoimentos</p>
                <p class="mt-2 text-3xl font-bold text-[#1f1720]">{{ $stats['testimonials'] }}</p>
            </div>
            <div class="rounded-3xl border border-[#ead7df] bg-white p-5 shadow-sm">
                <p class="text-sm text-gray-500">Contatos</p>
                <p class="mt-2 text-3xl font-bold text-[#1f1720]">{{ $stats['contacts'] }}</p>
            </div>
        </div>

        <div class="grid gap-8 lg:grid-cols-2">
            <section class="rounded-3xl border border-[#ead7df] bg-white p-6 shadow-sm">
                <div class="mb-5 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-[#1f1720]">Atalhos de gestao</h3>
                </div>
                <div class="grid gap-3 sm:grid-cols-2">
                    <a href="{{ route('backoffice.products.index') }}" class="rounded-2xl border border-[#ead7df] px-4 py-4 text-sm font-medium text-[#1f1720] hover:bg-[#fff6f8]">Gerenciar produtos</a>
                    <a href="{{ route('backoffice.banners.index') }}" class="rounded-2xl border border-[#ead7df] px-4 py-4 text-sm font-medium text-[#1f1720] hover:bg-[#fff6f8]">Gerenciar banners</a>
                    <a href="{{ route('backoffice.faqs.index') }}" class="rounded-2xl border border-[#ead7df] px-4 py-4 text-sm font-medium text-[#1f1720] hover:bg-[#fff6f8]">Gerenciar FAQs</a>
                    <a href="{{ route('backoffice.testimonials.index') }}" class="rounded-2xl border border-[#ead7df] px-4 py-4 text-sm font-medium text-[#1f1720] hover:bg-[#fff6f8]">Gerenciar depoimentos</a>
                </div>
            </section>

            <section class="rounded-3xl border border-[#ead7df] bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-[#1f1720]">Ultimos contatos</h3>
                <div class="mt-5 space-y-3">
                    @forelse ($recentContacts as $contact)
                        <div class="rounded-2xl bg-[#fff8f1] p-4">
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="font-semibold text-[#1f1720]">{{ $contact->nome }}</p>
                                    <p class="text-sm text-gray-500">{{ $contact->email }}</p>
                                </div>
                                <span class="text-xs text-gray-400">{{ $contact->created_at?->format('d/m/Y H:i') }}</span>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">{{ $contact->assunto }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">Nenhum contato registrado ainda.</p>
                    @endforelse
                </div>
            </section>
        </div>

        <section class="rounded-3xl border border-[#ead7df] bg-white p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-[#1f1720]">Produtos recentes</h3>
            <div class="mt-5 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="text-left text-xs uppercase tracking-[0.18em] text-gray-500">
                            <th class="pb-3">Produto</th>
                            <th class="pb-3">Categoria</th>
                            <th class="pb-3">Preco</th>
                            <th class="pb-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @foreach ($recentProducts as $product)
                            <tr>
                                <td class="py-3 font-medium text-[#1f1720]">{{ $product->title }}</td>
                                <td class="py-3 text-gray-500">{{ optional($product->category)->name }}</td>
                                <td class="py-3 text-gray-500">R$ {{ number_format((float) $product->price_sale, 2, ',', '.') }}</td>
                                <td class="py-3">
                                    <span class="rounded-full px-3 py-1 text-xs {{ $product->status ? 'bg-emerald-100 text-emerald-700' : 'bg-gray-100 text-gray-500' }}">
                                        {{ $product->status ? 'Ativo' : 'Inativo' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-app-layout>
