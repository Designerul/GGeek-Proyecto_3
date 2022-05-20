<div class="card-body">

    {!! Form::open(['route' => ['comment.store']]) !!}

        {!! Form::hidden('post_id', $post->id) !!}

        {{-- Agregar comentario --}}
        {!! Form::text('body', null, ['class' => 'text']) !!}

        {{-- Boton para crear etiqueta --}}
         {!! Form::submit('Agregar comentario', ['class' => 'text-white font-bold py-2 px-4 rounded', 'style' => 'background: #df4759']) !!}

    {!! Form::close() !!}

</div>