@extends('layouts.guest')

{{ $slot = ''}}

@section('links')

@endsection

@section('title')
    Dashboard
@endsection

@section('header')
    <a href="" class="link-header">Criar CV</a>
    <a href="{{ route('profile') }}" class="link-header">Meu Perfil</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link">Sair</button>
    </form>
@endsection

@section('content')

@endsection