@extends('layouts.guest')
{{ $slot = '' }}

@section('links')
    <link rel="stylesheet" href="../css/style.css">
@endsection

@section('title', 'Criar Currículo')

@section('header')
    <a href="{{ route('dashboard') }}" class="link-header">Dashboard</a>
    <a href="{{ route('profile') }}" class="link-header">Meu perfil</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link">Sair</button>
    </form>
@endsection

@section('content')

@endsection