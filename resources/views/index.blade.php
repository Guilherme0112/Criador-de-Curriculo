@extends('layouts.app')

@section('links')
    <link rel="shortcut icon" href="../icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">

@endsection

@section('title', 'Curriculados')

@section('content')
    <header>
        <a href="{{ route('register') }}" class="link-header">Criar Conta</a>
        <a href="{{ route('login') }}" class="link-header">Entrar</a>
    </header>
    <main>
        <section>
            <div class="parte-1">
                <img src="https://ideogram.ai/assets/image/lossless/response/Jdj5dMA-SvCGdysPh8j2kQ" alt="" class="img-one">
            </div>
            <div class="parte-1">
                <h1>Crie seu currículo agora mesmo!</h1>
                <button class="btn-one">Criar Currículo</button>
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
    </main>
@endsection