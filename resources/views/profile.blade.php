@extends('layouts.guest')

@section('links')

@endsection

@section('title')
    {{ Auth::user()->name }}
@endsection

@section('header')
<a href="" class="link-header">Criar CV</a>
<a href="{{ route('dashboard') }}" class="link-header">Dashboard</a>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-link">Sair</button>
</form>
{{ $slot = '' }}
@endsection

@section('content')
    teste
@endsection