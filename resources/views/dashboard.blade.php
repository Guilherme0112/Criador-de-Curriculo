@extends('layouts.guest')

{{ $slot = ''}}

@section('links')
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dashboard.css">
@endsection

@section('title')
    Dashboard
@endsection

@section('header')
    <a href="{{ route('criar') }}" class="link-header">Criar CV</a>
    <a href="{{ route('profile') }}" class="link-header">Meu Perfil</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link">Sair</button>
    </form>
@endsection

@section('content')
    <section>
        <h1>Modelos</h1>
    </section>
@endsection