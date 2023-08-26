<div class="form-group">
    {!! Form::label('question', "Ingrese la pregunta:") !!}
    {!! Form::text('question', null, ['class'=>'form-control','placeholder'=>'Ingrese la pregunta']) !!}

    @error('question')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category', 'Seleccione la categoría') !!}
    {!! Form::select('category', $categories, null, ['class'=>'form-control','placeholder'=>'Seleccione categoria...']) !!}
    
    @error('category')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('criticality', 'Ingrese criticidad') !!}
    {!! Form::select('criticality', $criticality, null, ['class'=>'form-control','placeholder'=>'Seleccione criticidad']) !!}
    
    @error('criticality')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weithg-bold">¿Genera otras preguntas?</p>
    <label>
        {!! Form::radio('genere', 'Si', false) !!}
        Si
    </label>

    <label>
        {!! Form::radio('genere', 'No', true) !!}
        No
    </label>
</div>

<div class="form-group">
    <p class="font-weith-bold">¿Genera riesgo con?</p>
    <label>
        {!! Form::radio('risk', 'Si', true) !!}
        Si
    </label>
    <label>
        {!! Form::radio('risk', 'No', false) !!}
        No
    </label>
</div>