<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Planner') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="/site.webmanifest">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md text-center">

        <!-- Título -->
        <h1 class="text-3xl font-bold mb-2">Planner</h1>
        <p class="text-gray-500 mb-6">Organize suas tarefas de forma simples</p>

        @auth
            <!-- Usuário logado -->
            <a href="{{ route('tasks.index') }}"
               class="w-full block bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                Ir para minhas tarefas
            </a>
        @else
            <!-- Não logado -->
            <div class="flex flex-col gap-3">

                <a href="{{ route('login') }}"
                   class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                    Entrar
                </a>

                <a href="{{ route('register') }}"
                   class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition">
                    Criar conta
                </a>

            </div>
        @endauth

    </div>

</body>
</html>
