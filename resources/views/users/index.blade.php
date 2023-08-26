@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')

    <a class="btn btn-primary btn-sm float-right" href="{{route('users.create')}} ">Crear usuario</a>

    <h1>Listado de usuarios</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}} </strong>
        </div>
    @endif

    @livewire('user-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop