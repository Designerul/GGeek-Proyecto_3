@extends('adminlte::page')

@section('title', 'Dashboard Etiquetas')

@section('content_header')
    {{-- Boton de regreso --}}
    <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.tags.index') }}">Regresar</a>

    <h1>Editar etiqueta</h1>
@stop

@section('content')

    {{-- Mensaje cuando se edita de forma correcta --}}
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
        
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::model($tag ,['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}

                {{-- Editar nombre de etiqueta --}}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta']) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Editar slug de etiqueta automaticamente --}}
                <div class="form-group">
                    {!! Form::label('slug', 'Slug:') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la etiqueta', 'readonly']) !!}

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Boton para agregar los cambios --}}
                {!! Form::submit('Actualizar etiqueta', ['class' => 'btn btn-primary']) !!}

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