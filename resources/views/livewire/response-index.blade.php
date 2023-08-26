<div>
    <br>

    <div class="card">
        <div class="card-header">
            <h3><strong>Usuario:</strong> {{$this->nombre->name}}</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h4><strong>Derecho laboral</strong></h4> 
                        </div>
                        <div class="card-body">
                            <h5>{{$respuestas[0]}} de {{$total[0]}} Preguntas</h5>
                            <h5>{{round($respuestas[0]/$total[0]*100)}}% Respuestas</h5>
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="card card-outline card-secondary">
                        <div class="card-header">
                            <h4><strong>Derecho Tributario</strong></h4> 
                        </div>
                        <div class="card-body">
                            <h5>{{$respuestas[1]}} de {{$total[1]}} Preguntas</h5>
                            <h5>{{round($respuestas[1]/$total[1]*100)}}% Respuestas</h5>
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h4><strong>Administración</strong></h4> 
                        </div>
                        <div class="card-body">
                            <h5>{{$respuestas[2]}} de {{$total[2]}} Preguntas</h5>
                            <h5>{{round($respuestas[2]/$total[2]*100)}}% Respuestas</h5>
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h4><strong>Comercial</strong></h4> 
                        </div>
                        <div class="card-body">
                            <h5>{{$respuestas[3]}} de {{$total[3]}} Preguntas</h5>
                            <h5>{{round($respuestas[3]/$total[3]*100)}}% Respuestas</h5>
                        </div>
                    </div>
                </div>

                <div class="col-2">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h4><strong>Contratación</strong></h4> 
                        </div>
                        <div class="card-body">
                            <h5>{{$respuestas[4]}} de {{$total[4]}} Preguntas</h5>
                            <h5>{{round($respuestas[4]/$total[4]*100)}}% Respuestas</h5>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
        
        <div class="card-footer">
            <h5>{{array_sum($respuestas)}} de {{array_sum($total)}} Preguntas totales</h5>
            <h5>{{round(array_sum($respuestas)/array_sum($total)*100)}}% respuestas totales</h5>
        </div>
    </div>  

    <div class="card mt-2">
        <div class="card-header">
            <div class="form-group">
                <label>Seleccione la categoría:</label>

                <select wire:model="category" class="form-control">
                    <option value="laboral">Derecho Laboral</option>
                    <option value="tributario">Derecho Tributario</option>
                    <option value="adminstración">Administración</option>
                    <option value="comercial">Comercial</option>
                    <option value="contratación">Contratación</option>
                </select>
            </div>

            <div class="form-group">
                <label>Seleccione criticidad:</label>

                <select wire:model="criticidad" class="form-control">
                    <option value="">Todas</option>
                    <option value="Alto">Alto</option>
                    <option value="Medio">Medio</option>
                    <option value="Bajo">Bajo</option>
                </select>

            </div>
            
        </div>
        <div class="card-body">
            @if (!empty($info))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Pregunta</th>
                            <th>Respuesta</th>
                            <th>¿Genera?</th>
                            <th>¿Genera pregunta con?</th>
                            <th>Criticidad</th>
                            <th>Comentario</th>
                        </tr>
                    </thead>
                

                    <tbody>
                        @foreach ($info as $key =>$dato)
                            <tr>
                                <td>{{$dato['question']}}</td>
                                <td>{{$dato->response[0]->response}}</td>
                                <td>{{$dato['genere']}}</td>
                                <td>
                                    @php
                                        $condicion = "" 
                                    @endphp

                                    @if($dato['yes'] and $dato['no'])
                                        @php
                                            $condicion = "Si y No" 
                                        @endphp
                                    @elseif($dato['yes'])
                                        @php
                                            $condicion = "Si" 
                                        @endphp
                                    @elseif ($dato['no'])
                                        @php
                                            $condicion = "No" 
                                        @endphp
                                    @endif

                                    

                                    {{$condicion}}
                                </td>
                                <td>
                                    @if ($dato['criticality'] =="Alto")
                                        @php
                                            $color = "danger";
                                        @endphp
                                    @elseif ($dato['criticality'] =="Medio")
                                        @php
                                            $color = "warning";
                                        @endphp
                                    @else
                                        @php
                                            $color = "secondary";
                                        @endphp
                                    @endif
                                    <span class="badge badge-{{$color}} rounded-pill">{{$dato['criticality']}}</span>
                                </td>
                                <td>{{Str::limit($dato->response[0]->comment,700,'...')}}</td>
                            </tr>
                            {{-- @dump($dato->response[0]->response) --}} 
                        @endforeach
                    </tbody>
                </table>
            @else
                No hay ningún respuesta
            @endif
        </div>
    </div>
</div>
