@extends('adminlte::page')

@section('title', 'Crear usuario')

@section('content_header')
    <h1>Crear usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'users.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre:' ) !!}
                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del usuario']) !!}
                    
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Ingrese el correo electronico del usuario']) !!}
                
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::text('password', null, ['class'=>'form-control','placeholder'=>'Ingrese la contraseña']) !!}
                
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {!! Form::submit('Crear usuario', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
<script> console.log('Hi!'); </script>