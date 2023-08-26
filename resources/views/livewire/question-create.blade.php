<div class="card">
    <div class="card-body">
       {!! Form::open(['route'=>'questions.store','autocomplete'=>'off']) !!}

        <div class="form-group">
            {!! Form::label('question', "Ingrese la pregunta:") !!}
            {!! Form::text('question', null, ['class'=>'form-control','placeholder'=>'Ingrese la pregunta','wire:model'=>"question"]) !!}
        
            @error('question')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        
        <div class="form-group">
            {!! Form::label('category', 'Seleccione la categoría') !!}
            {!! Form::select('category', $categories, null, ['class'=>'form-control','placeholder'=>'Seleccione categoria...','wire:model'=>"category"]) !!}
            
            @error('category')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        
        <div class="form-group">
            {!! Form::label('criticality', 'Ingrese criticidad') !!}
            {!! Form::select('criticality', $criticidad, null, ['class'=>'form-control','placeholder'=>'Seleccione criticidad','wire:model'=>"criticality"]) !!}
            
            @error('criticality')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <p class="font-weithg-bold">¿Genera otras preguntas?</p>
            <label>
                {!! Form::radio('genere', 'Si', false,['wire:model'=>"genere"]) !!}
                Si
            </label>
        
            <label>
                {!! Form::radio('genere', 'No', true,['wire:model'=>"genere"]) !!}
                No
            </label>
        </div>

        @if ($errorGeneral != "")
            <p class="text-danger text-center">{{$errorGeneral}}</p>                
        @endif

        @if ($genere=="Si")
            <div class="form-group">
                <p>¿Genera pregunta con?</p>
                <label>
                    {!! Form::checkbox('yes', 1, false,['wire:model'=>'yes']) !!}
                    Si
                </label>
                <label>
                    {!! Form::checkbox('no', 1, false,['wire:model'=>'no']) !!}
                    No
                </label>
            </div>
        @endif
        
        
        
        
        
        @if ($yes==true)
            <div class="card">
                <div class="card-header">
                    <h5>Ingrese las preguntas cuando la respuesta es si</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('secundary', "Ingrese la pregunta:") !!}
                        {!! Form::text('secundary', null, ['class'=>'form-control','placeholder'=>'Ingrese la pregunta','wire:model'=>"secundary"]) !!}
                    
                        @error('secundary')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <button wire:click.prevent='agregaryes()' class="btn btn-success btn-sm float-right">Agregar pregunta</button>    
                    </div>

                    @if ($mensajeError != "")
                        
                        <p class="text-danger text-center">{{$mensajeError}}</p>
                        
                    @endif

                    @if (!empty($questionsyes))
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th colspan="1"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($questionsyes as $key => $pregunta)        
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$pregunta['question']}}</td>
                                        <td width="5px">
                                            <td widht="5px">
                                                <form action="{{route('questions.store')}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="fas fa-trash-alt btn btn-danger float-right btn-xs"></button>
                                                </form>
                                            </td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    @endif
                    


                </div>
            </div>
        @endif

        @if ($no==true)
            <div class="card">
                <div class="card-header">
                    <h5>Ingrese las preguntas cuando la respuesta es no</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('secundaryNo', "Ingrese la pregunta:") !!}
                        {!! Form::text('secundaryNo', null, ['class'=>'form-control','placeholder'=>'Ingrese la pregunta','wire:model'=>"secundaryNo"]) !!}
                    
                        @error('secundaryNo')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <button wire:click.prevent='agregarno()' class="btn btn-success btn-sm float-right">Agregar pregunta</button>    
                    </div>

                    @if ($mensajeErrorNo != "")
                        
                        <p class="text-danger text-center">{{$mensajeErrorNo}}</p>
                        
                    @endif

                    @if (!empty($questionsno))
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th colspan="1"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($questionsno as $key => $pregunta)        
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$pregunta['question']}}</td>
                                        <td width="5px">
                                            <td widht="5px">
                                                <form action="{{route('questions.store')}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="fas fa-trash-alt btn btn-danger float-right btn-xs"></button>
                                                </form>
                                            </td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    @endif
                    


                </div>
            </div>
        @endif
        
        

        

        {!! Form::submit('Crear pregunta', ['class'=>'btn btn-primary','wire:click.prevent'=>'add()']) !!}
        <a class="btn btn-primary" href="{{route('questions.index')}}">Volver</a>

        {!! Form::close() !!}

        

    </div>
</div>


