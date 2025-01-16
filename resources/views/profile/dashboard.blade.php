<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="container">
                    <h1>Listado de Usuarios</h1>
                    <br>
                   <a href="{{ route('register') }}"><button class="btn btn-success" >Crear Usuario</button></a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Numero de Telefono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->Nombre }}</td>
                                    <td>{{ $user->Apellido }}</td>
                                    <td>{{ $user->Correo }}</td>
                                    <td>{{ $user->Nrodetelefono }}</td>
                                    <td>
                                        <a href="{{ route('profile.edit',$user->id) }}">
                                            <button class="btn btn-primary btn-sm">Editar</button>
                                        </a>  
                                        <form action="{{ route('profile.destroy', $user->id) }}" method="POST"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger btn-sm">Borrar</button> </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
