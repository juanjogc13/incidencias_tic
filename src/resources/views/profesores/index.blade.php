<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Profesores</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Profesores</h1>
            <div class="space-x-2">
                <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Dashboard
                </a>
                <a href="{{ route('profesores.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Nuevo Profesor
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Nombre</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Departamento</th>
                        <th class="px-6 py-3 text-left">Teléfono</th>
                        <th class="px-6 py-3 text-left">Rol</th>
                        <th class="px-6 py-3 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($profesores as $profesor)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $profesor->id }}</td>
                        <td class="px-6 py-4">{{ $profesor->nombre }} {{ $profesor->apellidos }}</td>
                        <td class="px-6 py-4">{{ $profesor->email }}</td>
                        <td class="px-6 py-4">{{ $profesor->departamento }}</td>
                        <td class="px-6 py-4">{{ $profesor->telefono ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            @if($profesor->es_coordinador_tde)
                                <span class="bg-green-200 text-green-800 px-2 py-1 rounded text-sm font-semibold">
                                    Coordinador TDE
                                </span>
                            @else
                                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded text-sm font-semibold">
                                    Profesor
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('profesores.show', $profesor->id) }}" class="text-blue-600 hover:underline mr-3">Ver</a>
                            <a href="{{ route('profesores.edit', $profesor->id) }}" class="text-green-600 hover:underline mr-3">Editar</a>
                            <form action="{{ route('profesores.destroy', $profesor->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('¿Estás seguro de eliminar este profesor?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            No hay profesores registrados
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>