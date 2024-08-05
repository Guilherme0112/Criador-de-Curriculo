@extends('layouts.guest')

@section('links')
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
@endsection

@section('title')
    {{ Auth::user()->name }}
@endsection

@section('header')
<a href="{{ route('criar') }}" class="link-header">Criar CV</a>
<a href="{{ route('dashboard') }}" class="link-header">Dashboard</a>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-link">Sair</button>
</form>
{{ $slot = '' }}
@endsection

@section('content')
    <section class="box">
        <p>A exlusão da sua conta é uma ação permanente, então antes de tomar qualquer decisão pense cautelosamente.</p> 
        <form method="POST" action="{{ route('destroyAccount') }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" title="Excluir Conta">Excluir Conta</button>
        </form>
    </section>
@endsection