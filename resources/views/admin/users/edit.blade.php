@extends('adminlte::page')

@section('title', 'Dashboard Users')

@section('content_header')
    {{-- Boton de regreso --}}
    <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.users.index') }}">Regresar</a>

    <h1>Asignar un rol</h1>
@stop

@section('content')

    {{-- Mensaje de asignacion de rol de forma correcta --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            
            {{-- Nombre de usuario --}}
            <p class="h5">Nombre:</p>
            <p class="form-control">{{ $user->name }}</p>

            {{-- Listado de roles y botones de asignacion --}}
            <h2 class="h5">Listado de roles:</h2>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

                {{-- Seleccionar roles de usuario --}}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                
                {{-- Boton para agregar rol --}}
                {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}

        </div>
    </div>    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop