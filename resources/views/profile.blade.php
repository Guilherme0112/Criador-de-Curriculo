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
        <h1>Informações para o Currículo</h1>
        <div>
            @foreach($dadosC as $dadoC)
                <b>Nome:</b>
                <p>{{ $dadoC['nome'] }}</p>
                <b>E-mail:</b>
                <p>{{ $dadoC['email'] }}</p>
                <b>Telefone:</b>
                <p>{{ $dadoC['telefone'] }}</p>
            @endforeach
        </div>
        <div>
            @foreach($dadosC as $dadoC)
                <b>Idiomas:</b>
                <p>{{ $dadoC['idiomas'] }}</p>
            @endforeach  
            <a href="{{ route('question') }}">Criar outro currículo</a>
        </div>
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