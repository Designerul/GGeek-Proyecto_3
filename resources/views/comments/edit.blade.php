<div>
    @if (auth()->user()->id == $comment->user_id)
        <td width="10px">
            <form action="{{ route('comment.destroy', $comment) }}" method="POST" class="py-2">
                @csrf
                @method('delete')
                {{-- Boton para borrar comentario --}}
                <button style="background: #df4759" class="text-white font-bold py-2 px-4 rounded" type="submit">Eliminar</button>
            </form>
        </td>
    @else
        @can('comment.destroy')
            <td width="10px">
                <form action="{{ route('comment.destroy', $comment) }}" method="POST" class="py-2">
                    @csrf
                    @method('delete')
                    {{-- Boton para borrar comentario --}}
                    <button style="background: #df4759" class="text-white font-bold py-2 px-4 rounded" type="submit">Eliminar</button>
                </form>
            </td>
        @endcan
    @endif
</div>