
@extends('layouts.base')


@section('title', 'Lista de projetos')


@section('content', 'projetos')


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($projects->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    
                    <td>{{ $project->value }}</td>
                 
                    <td>
                        <a href="{{ url('projects/'.$project->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ url('projects/'.$project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Nenhum projeto encontrado.</p>
@endif
</body>
</html>

@endsection