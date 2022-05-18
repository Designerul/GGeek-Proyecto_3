<div>
    <div class="card">

        {{-- Alerta de borrado --}}
        @if (session('infodelete'))
            <div class="alert alert-danger">
                <strong>{{ session('infodelete') }}</strong>
            </div>
        @endif

        {{-- Barra de busqueda por nombre y correo de usuario  --}}
        <div class="card-header">
            <input wire:model="search" class="form-control" type="text" placeholder="Ingrese el nombre o correo de un usuario">
        </div>

        @if ($users->count())

            {{-- Muestra lista de usuarios --}}
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                {{-- Recuperar rol de usuario --}}
                                <td>{{ $user->getRoleNames() }}</td>
                                

                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user) }}">Editar</a>
                                </td>

                                {{-- Boton para eliminar de usuario --}}
                                <td width="10px">
                                    @can('admin.users.destroy')
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Muestra links de paginacion --}}
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        
        @else
            
            {{-- Mensaje en caso de no tener registros --}}
            <div class="card-body">
                <strong>
                    No existen registros
                </strong>
            </div>

        @endif
        
    </div>
</div>
