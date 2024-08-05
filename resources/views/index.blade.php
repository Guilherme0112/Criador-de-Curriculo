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
        <div class="part-1">
            <h1>Crie seu currículo agora mesmo!</h1>
        </div>
    </main>
@endsection