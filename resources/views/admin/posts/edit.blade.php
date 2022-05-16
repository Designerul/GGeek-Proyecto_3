@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- Boton de regreso --}}
    <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.posts.index') }}">Regresar</a>

    <h1>Editar post</h1>
@stop


@section('content')

    {{-- Mensaje de actualizacion de post --}}
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

                {{-- Incluir formulario para editar post --}}
                @include('admin.posts.partials.form')

                {{-- Boton para agregar cambios al post --}}
                {!! Form::submit('Actualizar post', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    {{-- script para agregar el slug automaticamente --}}
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    {{-- script de editor de texto --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

    
    <script>
        //Agregar slug
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        //Agregar editor de texto en extracto
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );

        //Agregar editor de texto en el body
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );

        //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }

    </script>
@stop