@extends('adminlte::page')

@section('title', 'Preguntas')

@section('content_header')

    <a class="btn btn-primary btn-sm float-right" href="{{route('questions.create')}} ">Crear pregunta</a>

    <h1>Listado de preguntas</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}} </strong>
        </div>
    @endif

    @livewire('question-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop