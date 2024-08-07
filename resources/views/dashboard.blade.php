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
    <a href="{{ route('profile') }}" class="link-header">Meu Perfil</a>
    <form method="POST" action="{{ route('logout') }}" class="form-header">
        @csrf
        <button type="submit" class="btn btn-link">Sair</button>
    </form>
@endsection

@section('content')
    <section class="modelos">
        @foreach($modelos as $modelo)
            <a href="{{ route('criar', ['id' => $modelo->id]) }}" class="box-model">
                <img src="{{ $modelo->foto }}" alt="" class="img-model">
            </a>
        @endforeach
    </section>
@endsection