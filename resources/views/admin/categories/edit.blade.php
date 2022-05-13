@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar categoria</h1>
@stop

@section('content')
    
    {{-- Mensaje cuando se edita de forma correcta --}}
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
        
    @endif

    <div class="card">

        {{-- Boton de regreso --}}
        <div class="card-header">
            <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.index') }}">Regresar</a>
        </div>

        <div class="card-body">
            {!! Form::model($category ,['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}

                {{-- Editar nombre de categoria --}}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Editar slug de categoria automatico --}}
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la categoria', 'readonly']) !!}

                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                {{-- Boton para agregar los cambios --}}
                {!! Form::submit('Actualizar categoria', ['class' => 'btn btn-primary']) !!}

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