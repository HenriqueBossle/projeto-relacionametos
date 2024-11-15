@extends('layouts.base')

@section('title','Cadastrar novo cliente')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($client->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($client as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    
                    <td>{{ $client->phone }}</td>
                 
                    <td>
                        <a href="{{ url('client/'.$client->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ url('client/'.$client->id) }}" method="POST">
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
    <p>Nenhum cliente encontrado.</p>
@endif
</body>
</html>



@section('content')

