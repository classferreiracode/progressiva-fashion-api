<x-mail::message>
    # Novo contato do site

    **Nome:** {{ $dados['nome'] }}
    **E-mail:** {{ $dados['email'] }}
    **Telefone:** {{ $dados['telefone'] ?? 'Não informado' }}
    **Assunto:** {{ $dados['assunto'] }}

    **Mensagem:**
    {{ $dados['mensagem'] }}

    <x-mail::button :url="config('app.url')">
        Visitar o site
    </x-mail::button>

    Obrigado,<br>
    {{ config('app.name') }}
</x-mail::message>