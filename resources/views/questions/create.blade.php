@extends('adminlte::page')

@section('title', 'Preguntas')

@section('content_header')
    <h1>Crear Pregunta</h1>
@stop

@section('content')
    @livewire('question-create')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
<script> console.log('Hi!'); </script>