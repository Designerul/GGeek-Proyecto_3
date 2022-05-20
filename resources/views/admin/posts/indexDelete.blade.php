@extends('adminlte::page')

@section('title', 'Dashboard Posts')

@section('content_header')
    {{-- Boton de agregar post --}}
    <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.posts.index') }}">Regresar</a>

    <h1>Lista de posts eliminados</h1>
@stop

@section('content')
    
    @livewire('admin.posts-index-delete')

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop