@extends('template')
@section('content')
    <!-- Título -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-800">
            Escolha seu Plano
        </h1>
        <p class="text-gray-500 mt-3">
            Comece no Chave Digital e evolua conforme precisar, simples assim!
        </p>
    </div>

    <!-- Planos -->
    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">

        <!-- Plano Básico -->
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
            <h2 class="text-xl font-semibold">Starter</h2>

            <p class="text-4xl font-bold mt-4">
                R$ 59,90
                <span class="text-sm text-gray-500">/mês</span>
            </p>

            <ul class="mt-6 space-y-3 text-gray-600">
                <li>✔ 1 Usuário</li>
                <li>✔ Até 100 Leads</li>
                <li>✔ Suporte por email</li>
                <li>✔ Follow-up</li>
            </ul>
            <form action="{{ route('pagamento.checkout', 'price_1T6BcAC6gzfmqJLeGHAU3BXp') }}" method="POST">
                @csrf
                <button class="mt-8 w-full bg-black text-white py-3 rounded-lg hover:bg-gray-700 transition" type="submit">
                    Assinar
                </button>
            </form>

        </div>


        <!-- Plano Pro (Destaque) -->
        <div class="bg-black text-white rounded-2xl shadow-2xl p-10 text-center scale-105">

            <span class="bg-white text-black px-3 py-1 rounded-full text-sm font-semibold">
                Mais Popular
            </span>

            <h2 class="text-xl font-semibold mt-4">Pro</h2>

            <p class="text-5xl font-bold mt-4">
                R$119,90
                <span class="text-sm opacity-80">/mês</span>
            </p>

            <ul class="mt-6 space-y-3">
                <li>✔ 1 Usuário</li>
                <li>✔ Até 500 leads</li>
                <li>✔ Até 150 imóveis</li>
                <li>✔ Suporte prioritário</li>
            </ul>
            <form action="{{ route('pagamento.checkout', 'price_1T6BcoC6gzfmqJLe2zXvEtiS') }}" method="POST">
                @csrf
                <button class="mt-8 w-full bg-white text-black py-3 rounded-lg font-semibold hover:bg-gray-100 transition" type="submit">
                    Assinar Agora
                </button>
            </form>
        </div>


        <!-- Plano Premium -->
        <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
            <h2 class="text-xl font-semibold">Imobiliária</h2>

            <p class="text-4xl font-bold mt-4">
                R$199,90
                <span class="text-sm text-gray-500">/mês</span>
            </p>

            <ul class="mt-6 space-y-3 text-gray-600">
                <li>✔ Até 3 usuários</li>
                <li>✔ Leads ilimitados</li>
                <li>✔ Imóveis ilimitados</li>
                <li>✔ Suporte prioritário</li>
            </ul>
            <form action="{{ route('pagamento.checkout', 'price_1T6BefC6gzfmqJLeLrmK8cTM') }}" method="POST">
                @csrf
                <button class="mt-8 w-full bg-black text-white py-3 rounded-lg hover:bg-gray-700 transition" type="submit">
                    Assinar
                </button>
            </form>
        </div>

    </div>
@endsection
