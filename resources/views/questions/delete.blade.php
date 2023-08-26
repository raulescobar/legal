@extends('adminlte::page')

@section('title', 'Preguntas')

@section('content_header')
    <h1>Eliminar pregunta</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}} </strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            
            @if ($question->genere == "Si")
                <p>¿Realmente desea eliminar la pregunta</p>
                <p>{{$question->question}}</p>
                <p>y además las preguntas que está genera?</p>
            @else
                <p>¿Realmente desea eliminar la pregunta?</p> 
                <p>{{$question->question}}</p>
            @endif

            <div class="container">
                <div class="row">
                    <div class="col-1">
                        <form action="{{route('questions.destroy',$question)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        
                    </div>
                    <div class="col-1">
                        <a class="btn btn-primary btn-sm" href="{{route('questions.index')}}">Volver</a>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop