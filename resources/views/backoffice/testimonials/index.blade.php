<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold text-[#1f1720]">Depoimentos</h2>
            <a href="{{ route('backoffice.testimonials.create') }}" class="rounded-full bg-[#b6406f] px-5 py-3 text-sm font-semibold text-white">Novo depoimento</a>
        </div>
    </x-slot>
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 space-y-4">
        @foreach($testimonials as $testimonial)
            <div class="rounded-3xl border border-[#ead7df] bg-white p-5 shadow-sm">
                <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                    <div class="flex-1">
                        <p class="font-semibold text-[#1f1720]">{{ $testimonial->name }}</p>
                        <p class="mt-2 text-sm text-gray-600">{{ $testimonial->content }}</p>
                        <p class="mt-2 text-xs text-gray-500">Nota: {{ $testimonial->rating }}/5</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('backoffice.testimonials.edit', $testimonial) }}" class="rounded-full border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-700">Editar</a>
                        <form method="POST" action="{{ route('backoffice.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Remover este depoimento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-full border border-red-200 px-3 py-2 text-xs font-semibold text-red-600">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-6">{{ $testimonials->links() }}</div>
    </div>
</x-app-layout>
