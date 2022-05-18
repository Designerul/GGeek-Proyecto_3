@extends('adminlte::page')

@section('title', 'Dashboard Etiquetas')

@section('content_header')
    <h1>Crear etiqueta</h1>
@stop

@section('content')

    <div class="card">

        {{-- Boton de regreso --}}
         <div class="card-header">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.tags.index') }}">Regresar</a>
        </div>

        <div class="card-body">

            {!! Form::open(['route' => 'admin.tags.store']) !!}

                {{-- Agregar nombre de etiqueta --}}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta']) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Agregar slug de etiqueta automaticamente --}}
                <div class="form-group">
                    {!! Form::label('slug', 'Slug:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la etiqueta', 'readonly']) !!}

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Boton para crear etiqueta --}}
                {!! Form::submit('Crear etiqueta', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@stop

{{-- script para agregar el slug automaticamente --}}
@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop