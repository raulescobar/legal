@extends('adminlte::page')

@section('title', 'Preguntas')

@section('content_header')

@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}} </strong>
    </div>
    @endif
    <br>
    <div class="card">
    <div class="card-body">
        @if (isset($need))
        {!! Form::open(['route'=>'laboral.store']) !!}
            @csrf
            @method('POST')
                <h3>{{$need->question}}</h3>
                <div class="form-group">
                    <label>
                        {!! Form::radio('response', 'Si', false) !!}
                        Si
                    </label>

                    <label>
                        {!! Form::radio('response', 'No', false) !!}
                        No
                    </label>
                    @error('response')
                            <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('comment', 'Comentarios:') !!}
                    {!! Form::textarea('comment', '', ['class'=>'form-control']) !!}
                </div>
                {!! Form::text('question_id', $need->id, ['hidden']) !!}
            </div>
            <div class="card-footer">
                {!! Form::submit('Siguiente', ['class'=>'btn btn-primary float-right']) !!}
            </div>
        {!! Form::close() !!}
        @else
            <h3>No hay preguntas para mostrar</h3>
        @endif
    </div>  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop