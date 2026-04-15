<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-[#1f1720]">Banners</h2>
            <a href="{{ route('backoffice.banners.create') }}" class="rounded-full bg-[#b6406f] px-5 py-3 text-sm font-semibold text-white">Novo banner</a>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="space-y-4">
            @foreach($banners as $banner)
                <div class="flex flex-col gap-4 rounded-3xl border border-[#ead7df] bg-white p-5 shadow-sm md:flex-row md:items-center md:justify-between">
                    <div class="min-w-0 flex-1">
                        <p class="font-semibold text-[#1f1720]">{{ $banner->alt_text ?: 'Sem texto alternativo' }}</p>
                        <p class="truncate text-sm text-gray-500">{{ $banner->image }}</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('backoffice.banners.edit', $banner) }}" class="rounded-full border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-700">Editar</a>
                        <form method="POST" action="{{ route('backoffice.banners.destroy', $banner) }}" onsubmit="return confirm('Remover este banner?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-full border border-red-200 px-3 py-2 text-xs font-semibold text-red-600">Excluir</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $banners->links() }}</div>
    </div>
</x-app-layout>
