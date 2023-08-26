@extends('adminlte::page')

@section('title', 'Preguntas')

@section('content_header')

    <a class="btn btn-primary btn-sm float-right" href="{{route('questions.create')}} ">Crear pregunta</a>

    <h1>Editar pregunta</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}} </strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            {!! Form::model($question, ['route'=>['questions.update',$question]]) !!}
            @csrf
            @method('PUT')
                @if ($question->relationship == null)
                    <div class="form-group">
                        {!! Form::label('question', "Ingrese la pregunta:") !!}
                        {!! Form::text('question', $question->question, ['class'=>'form-control','placeholder'=>'Ingrese la pregunta']) !!}
                    
                        @error('question')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('category', 'Seleccione la categoría') !!}
                        {!! Form::select('category', $categories, $question->category, ['class'=>'form-control','placeholder'=>'Seleccione categoria...']) !!}
                        
                        @error('category')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('criticality', 'Ingrese criticidad') !!}
                        {!! Form::select('criticality', $criticidad, null, ['class'=>'form-control','placeholder'=>'Seleccione criticidad']) !!}
                        
                        @error('criticality')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <p class="font-weithg-bold">¿Genera otras preguntas?</p>
                        <label>
                            {!! Form::radio('genere', 'Si', false,['disabled']) !!}
                            Si
                        </label>
                    
                        <label>
                            {!! Form::radio('genere', 'No', true,['disabled']) !!}
                            No
                        </label>
                    </div>
                    
                @else
                    <div class="form-group">
                        {!! Form::label('question', "Ingrese la pregunta:") !!}
                        {!! Form::text('question', $question->question, ['class'=>'form-control','placeholder'=>'Ingrese la pregunta']) !!}
                    
                        @error('question')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                @endif
                {!! Form::submit('Actualizar pregunta', ['class'=>'btn btn-primary']) !!}
                <a class="btn btn-primary" href="{{route('questions.index')}}">Volver</a>
            {!! Form::close() !!}
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop