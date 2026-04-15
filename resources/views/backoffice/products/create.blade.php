<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-[#1f1720]">Novo produto</h2>
    </x-slot>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-[#ead7df] bg-white p-6 shadow-sm">
            <form method="POST" action="{{ route('backoffice.products.store') }}">
                @include('backoffice.products._form')
            </form>
        </div>
    </div>
</x-app-layout>
