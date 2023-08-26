<div class="card">
    <div class="card-header">
        <input wire:model="search" placeholder="Ingrese la pregunta a buscar" type="text" class="form-control">
    </div>
    @if ($questions->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Pregunta</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($questions as $question)
                        <tr onclick="window.location='{{route('questions.edit',$question)}}'" style="cursor: pointer;">
                            <td>{{$question->id}}</td>
                            <td>{{$question->question}}</td>
                            <td width="10px">
                                <a class="fas fa-edit btn btn-primary btn-sm" href="{{route('questions.edit',$question)}}"></a>
                                <td width="10px">
                                    <form action="{{url('questions/delete/'.$question->id)}}" method="POST">
                                        @csrf
                                        <button class="fas fa-trash-alt btn btn-danger btn-sm"></button>
                                    </form>
                                </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$questions->links()}}
        </div>
    @else
        <div class="card-body">
            No hay ningún resgistro
        </div>
    @endif

</div>
