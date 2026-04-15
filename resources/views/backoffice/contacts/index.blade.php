<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-[#1f1720]">Contatos recebidos</h2>
    </x-slot>
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="space-y-4">
            @foreach($contacts as $contact)
                <div class="rounded-3xl border border-[#ead7df] bg-white p-5 shadow-sm">
                    <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                        <div class="flex-1">
                            <p class="font-semibold text-[#1f1720]">{{ $contact->nome }}</p>
                            <p class="text-sm text-gray-500">{{ $contact->email }} @if($contact->telefone) · {{ $contact->telefone }} @endif</p>
                            <p class="mt-3 text-sm font-medium text-[#782744]">{{ $contact->assunto }}</p>
                            <p class="mt-2 text-sm text-gray-600">{{ $contact->mensagem }}</p>
                        </div>
                        <span class="text-xs text-gray-400">{{ $contact->created_at?->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $contacts->links() }}</div>
    </div>
</x-app-layout>
