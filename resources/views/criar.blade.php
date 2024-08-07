@extends('layouts.guest')
{{ $slot = '' }}

@section('links')
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/criar.css">
@endsection

@section('title', 'Criar Currículo')

@section('header')
    <a href="{{ route('dashboard') }}" class="link-header">Dashboard</a>
    <a href="{{ route('profile') }}" class="link-header">Meu perfil</a>
    <a href="" class="link-header" download="{{ $pdfName }}">Baixar</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link">Sair</button>
    </form>
@endsection

@section('content')
    <section class="papel">
        {!! $html !!}
    </section>
    <section class="info">
        <b>Nome: </b>
        <p>{{ $pdfName }}</p>
        <span style="width: 100%;"></span>
        <b>Proporção: </b>
        <p>1:1.25</p>
    </section>
@endsection