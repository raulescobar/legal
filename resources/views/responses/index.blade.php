@extends('adminlte::page')

@section('title', 'Preguntas')

@section('content_header')

@stop

@section('content')
    @livewire('response-index', ['userId' => $id])
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop