@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de etiquetas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>

    @elseif (session('infodelete'))
        <div class="alert alert-danger">
            <strong>{{ session('infodelete') }}</strong>
        </div>

    @endif

    <div class="card">

        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('admin.tags.create') }}">Agregar etiqueta</a>
        </div>

        <div class="card-body">
            <table class="table table-stiped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.tags.edit', $tag) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>   
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop

