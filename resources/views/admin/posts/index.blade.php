@extends('adminlte::page')

@section('title', 'Dashboard Posts')

@section('content_header')
    {{-- Boton de agregar post --}}
    <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.posts.create') }}">Agregar post</a>

    {{-- Boton de lista de post eliminados --}}
    <a class="btn btn-info btn-sm float-right mr-2" href="{{ route('admin.posts.indexDelete') }}">Posts eliminados</a>

    <h1>Lista de posts</h1>
@stop

@section('content')

    {{-- Mensaje de creacion de post --}}
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>

    {{-- Mensaje de eliminacion de post --}}
    @elseif (session('infodelete'))
    <div class="alert alert-danger">
        <strong>{{ session('infodelete') }}</strong>
    </div>
    @endif
    
    @livewire('admin.posts-index')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop