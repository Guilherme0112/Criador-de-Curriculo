@extends('layouts.guest')

@section('links')
    <link rel="stylesheet" href="../css/style.css" class="css">
    <link rel="stylesheet" href="../css/question.css">
@endsection

@section('title', 'Responda')
{{ $slot = null }}

@section('header')
    <a href="{{ route('dashboard') }}" class="link-header">Dashboard</a>
    <a href="{{ route('profile') }}" class="link-header">Meu Perfil</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link">Sair</button>
    </form>
@endsection

@section('content')
    <section>
        <form action="{{ route('question-store') }}" method="post" class="form">
            @csrf
            <label for="">Digite seu nome:</label>
            <input type="text" name="nome" id="" value="">
            <label for="">Digite seu e-mail:</label>
            <input type="text" name="email" id="" value="">
            <label for="">Digite seu número telefone:</label>
            <input type="text" name="telefone" id="" value="">
            <label for="">Diga suas experiências:</label>
            <textarea name='experiencias'></textarea>
            <label for="">Diga suas habilidades:</label>
            <textarea name="habilidades"></textarea>
            <label for="">Diga suas formações:</label>
            <textarea name="formacoes"></textarea>
            <label for="">Idiomas:</label>
            <textarea name="idiomas"></textarea>
            <input type="file" name="foto">
            <button class="btn-one">Enviar</button>
        </form>
    </section>
@endsection
