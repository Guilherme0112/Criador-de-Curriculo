@extends('layouts.guest')

@section('links')
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
@endsection

@section('title')
    {{ Auth::user()->name }}
@endsection

@section('header')
<a href="{{ route('dashboard') }}" class="link-header">Dashboard</a>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-link">Sair</button>
</form>
{{ $slot = '' }}
@endsection

@section('content')
    <section class="box">

    </section>
    <div class="box-2">
        <h1>Informações Pessoais</h1>
        <b>Nome: </b>
        <p>{{ $usuario->name }}</p>
        <b>Email: </b>
        <p>{{ $usuario->email }}</p>
        <b>Membro Desde:</b>
        <p>{{ $dateFormat }}</p>
    </div>
    <div class="box-1"> 
        <h1>Ajuda</h1>
        <a href="" class="btn-ajuda">Redefinir Senha</a>
        <a href="" class="btn-ajuda">Verificar E-mail</a>
    </div>
    <section class="box">
        <p>A exclusão da sua conta é uma ação permanente, então antes de tomar qualquer decisão pense cautelosamente.</p> 
        <form method="POST" action="{{ route('destroyAccount') }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" title="Excluir Conta">Excluir Conta</button>
        </form>
    </section>
@endsection