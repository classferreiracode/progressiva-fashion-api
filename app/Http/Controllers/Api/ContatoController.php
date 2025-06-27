<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContatoRequest;
use App\Mail\ContatoEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContatoController extends Controller
{
    public function enviar(ContatoRequest $request)
    {
        try {
            $dados = $request->validated();

            // Envia e-mail para o admin
            Mail::to(config('mail.from.address'))->send(new ContatoEmail($dados));

            // Opcional: Salvar no banco de dados
            // Contato::create($dados);

            return response()->json([
                'success' => true,
                'message' => 'Mensagem enviada com sucesso!'
            ]);
        } catch (\Exception $e) {
            Log::error('Erro ao enviar contato: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Erro ao enviar mensagem. Tente novamente mais tarde.'
            ], 500);
        }
    }
}
