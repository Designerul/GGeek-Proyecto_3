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
            @isset($post->image)
                <img id="picture" src="{{ Storage::url($post->image->url) }}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2021/03/22/01/58/monk-6113501_960_720.png" alt="">
            @endisset
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