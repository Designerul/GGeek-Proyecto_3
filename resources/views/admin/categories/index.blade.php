@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- Boton para crear nueva categoria --}}
    @can('admin.categories.create')
        <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.categories.create') }}">Agregar categoria</a>
    @endcan

    <h1>Lista de categorias</h1>
@stop

@section('content')

    {{-- Mensaje de creacion de categoria --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>

    {{-- Mensaje de eliminacion de categoria --}}
    @elseif (session('infodelete'))
        <div class="alert alert-danger">
            <strong>{{ session('infodelete') }}</strong>
        </div>
    @endif

    <div class="card">

        <div class="card-body">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>

                            {{-- Boton para editar categoria --}}
                            <td width="10px">
                                @can('admin.categories.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category)}}">Editar</a>
                                @endcan
                            </td>

                            {{-- Boton para eliminar categoria --}}
                            
                            <td width="10px">
                                @can('admin.categories.destroy')
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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
