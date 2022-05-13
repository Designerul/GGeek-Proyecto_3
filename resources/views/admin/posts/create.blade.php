@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- Boton de regreso --}}
    <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.posts.index') }}">Regresar</a>

    <h1>Crear nuevo post</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                {{-- Agregar nombre del post --}}
                <div class="form-group">
                    {!! Form::label('name', "Nombre:") !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Agregar slug del post automatico --}}
                <div class="form-group">
                    {!! Form::label('slug', "Slug:") !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del post', 'readonly']) !!}
                    
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Agregar categoria --}}
                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria:') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                
                    @error('category_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Agregar etiquetas --}}
                <div class="form-group">
                    <p class="font-weight-bold">Etiquetas:</p>
                    @foreach ($tags as $tag)
                        <label class="mr-2">
                            {!! Form::checkbox('tags[]', $tag->id, null) !!}
                            {{ $tag->name }}
                        </label>
                    @endforeach

                
                    @error('tags')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Elegir estado del post --}}
                <div class="form-group">
                    <p class="font-weight-bold">Estado:</p>

                    <label class="mr-2">
                        {!! Form::radio('status', 1, true) !!}
                        Borrador
                    </label>

                    <label class="mr-2">
                        {!! Form::radio('status', 2) !!}
                        Publicado
                    </label>

                    @error('status')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Agregar imagen --}}
                <div class="row mb-3">

                    {{-- Imagen defaul que se mostrar --}}
                    <div class="col">
                        <div class="image-wrapper">
                            <img id="picture" src="https://cdn.pixabay.com/photo/2021/03/22/01/58/monk-6113501_960_720.png" alt="">
                        </div>
                    </div>

                    {{-- Boton para agregar imagen --}}
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Imagen que se mostrar en el post') !!}
                            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                        
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <p>Agregar imagen de producto revisado</p>
                    </div>
                </div>

                {{-- Agregar extracto de texto --}}
                <div class="form-group">
                    {!! Form::label('extract', 'Extracto:') !!}
                    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
                
                    @error('extract')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Agregar cuerpo del post --}}
                <div class="form-group">
                    {!! Form::label('body', 'Cuerpo del post:') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                
                    @error('body')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Boton para crear post --}}
                {!! Form::submit('Crear post', ['class' => 'btn btn-primary']) !!}

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


{{-- script para agregar el slug automaticamente --}}
@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );

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