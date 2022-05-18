@extends('adminlte::page')

@section('title', 'Dashboard Etiquetas')

@section('content_header')
    {{-- Boton para crear nueva etiqueta --}}
    @can('admin.tags.create')
        <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.tags.create') }}">Agregar etiqueta</a>
    @endcan

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

        <div class="card-body">
            <table class="table table-stiped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Slug</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->slug }}</td>
                            
                            {{-- Boton para editar etiqueta --}}
                            <td width="10px">
                                @can('admin.tags.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.tags.edit', $tag) }}">Editar</a>
                                @endcan
                            </td>

                            {{-- Boton para eliminar etiqueta --}}
                            <td width="10px">
                                @can('admin.tags.destroy')
                                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                @endcan
                            </td>

                        </tr>   
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop

