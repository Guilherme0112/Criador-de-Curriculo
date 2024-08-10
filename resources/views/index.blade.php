@extends('layouts.app')

@section('links')
    <link rel="shortcut icon" href="../icon.png" type="image/x-icon">
@endsection

@section('title', 'Curriculados')

@section('content')
    <header>
        @if(Auth::check())
            <a href="{{ route('dashboard') }}" class="link-header">Dashboard</a>    
            <a href="{{ route('profile') }}" class="link-header">Meu Perfil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link">Sair</button>
            </form>
        @else
            <a href="{{ route('register') }}" class="link-header">Criar Conta</a>
            <a href="{{ route('login') }}" class="link-header">Entrar</a>
        @endif
    </header>
    <main>
        <section>
            <div class="parte-1">
                <img src="https://ideogram.ai/assets/image/lossless/response/Jdj5dMA-SvCGdysPh8j2kQ" alt="" class="img-one">
            </div>
            <div class="parte-1">
                <h1>Crie seu currículo agora mesmo!</h1>
                @if(Auth::check())
                    <a href="{{ route('dashboard') }}" class="btn-one">Criar Currículo</a>
                @else
                    <a href="{{ route('login') }}" class="btn-one">Criar Currículo</a>
                @endif
            </div>
        </section>
        <section class="parte-2">
            <div class="parte-1">
                <h1>
                    Crie seu currículo com apenas 3 passos!
                </h1>
            </div>
            <div class="parte-1 passos">
                <h3>
                    1. Faça login
                    <br>
                    2. Escolha seu modelo
                    <br>
                    3. Preencha com seus dados
                </h3>
            </div>
        </section>
        <section>
            @foreach($informacoes as $informacao)
                <div class="box-inf">
                    <h1>{{ $informacao->title }}</h1>
                    <p>
                        {{ $informacao->informacoes }}
                    </p>
                </div>
            @endforeach
        </section>
        <section>
            <div class="box-title">
                <h1 class="title">Modelos</h1>
            </div>
            @foreach($modelos as $modelo)
                <img src="{{ $modelo->foto }}" class="img-modelos">
            @endforeach
        </section>
    </main>
    <footer>

    </footer>
@endsection