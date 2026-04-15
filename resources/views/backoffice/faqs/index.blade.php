<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-[#1f1720]">FAQs</h2>
            <a href="{{ route('backoffice.faqs.create') }}" class="rounded-full bg-[#b6406f] px-5 py-3 text-sm font-semibold text-white">Nova FAQ</a>
        </div>
    </x-slot>
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-4">
        @foreach($faqs as $faq)
            <div class="rounded-3xl border border-[#ead7df] bg-white p-5 shadow-sm">
                <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                    <div class="flex-1">
                        <p class="font-semibold text-[#1f1720]">{{ $faq->question }}</p>
                        <p class="mt-2 text-sm text-gray-600">{{ $faq->answer }}</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('backoffice.faqs.edit', $faq) }}" class="rounded-full border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-700">Editar</a>
                        <form method="POST" action="{{ route('backoffice.faqs.destroy', $faq) }}" onsubmit="return confirm('Remover esta FAQ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-full border border-red-200 px-3 py-2 text-xs font-semibold text-red-600">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-6">{{ $faqs->links() }}</div>
    </div>
</x-app-layout>
