<div class="card">
     @if ($posts->count())
        
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha de eliminacion</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->deleted_at }}</td>

                        {{-- Boton para restaurar post --}}
                        <td width="10px">
                            <form action="{{ route('admin.posts.restore', $post->id) }}" method="POST">
                                @csrf

                                <button class="btn btn-primary btn-sm" type="submit">Restaurar</button>
                            </form>
                        </td>

                        {{-- Boton para eliminar permanentemente --}}
                        <td width="10px">
                            <form action="{{ route('admin.posts.forceDelete', $post->id) }}" method="POST">
                                @csrf

                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $posts->links() }}
        </div>

    @else
        <div class="card-body">
            <strong>No existe ningun registro</strong>
        </div>
    @endif
</div>
