<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Contato - Progressiva Fashion</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            background: linear-gradient(135deg, #e60976 0%, #fd6e9c 100%);
            padding: 30px 20px;
            text-align: center;
        }

        .header h1 {
            color: white;
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 30px;
        }

        .contact-info {
            background-color: #fdefe1;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .info-item {
            margin-bottom: 10px;
            display: flex;
        }

        .info-label {
            font-weight: bold;
            min-width: 100px;
            color: #e60976;
        }

        .message {
            background-color: #f8f9fa;
            border-left: 4px solid #e60976;
            padding: 15px;
            border-radius: 4px;
            white-space: pre-wrap;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #fdefe1;
            color: #666;
            font-size: 14px;
        }

        .logo {
            max-width: 180px;
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            background: #e60976;
            color: white !important;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 50px;
            margin-top: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #c40862;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(230, 9, 118, 0.3);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Novo Contato Recebido</h1>
        </div>

        <div class="content">
            <div class="contact-info">
                <div class="info-item">
                    <span class="info-label">Data:</span>
                    <span>{{ now()->format('d/m/Y H:i') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Nome:</span>
                    <span>{{ $dados['nome'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">E-mail:</span>
                    <span>{{ $dados['email'] }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Telefone:</span>
                    <span>{{ $dados['telefone'] ?? 'Não informado' }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Assunto:</span>
                    <span>{{ $dados['assunto'] }}</span>
                </div>
            </div>

            <h2 style="color: #e60976; margin-top: 0;">Mensagem</h2>
            <div class="message">
                {{ $dados['mensagem'] }}
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ config('app.url') }}" class="btn">Acessar o Site</a>
            </div>
        </div>

        <div class="footer">
            <img src="https://lojaprogressivafashion.com.br/logo-progressiva.png" alt="Progressiva Fashion" class="logo">
            <p>© {{ date('Y') }} Progressiva Fashion. Todos os direitos reservados.</p>
            <p>Esta mensagem foi enviada automaticamente, por favor não responda.</p>
        </div>
    </div>
</body>

</html>