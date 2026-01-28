<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Profesor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Detalles del Profesor</h1>
                <a href="{{ route('profesores.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Volver
                </a>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-xl font-bold mb-4 text-gray-700 border-b pb-2">Información Personal</h2>
                
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm font-semibold text-gray-500 uppercase">Nombre Completo</p>
                        <p class="text-lg text-gray-900">{{ $profesor->nombre }} {{ $profesor->apellidos }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-500 uppercase">Email</p>
                        <p class="text-lg text-gray-900">{{ $profesor->email }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-500 uppercase">Departamento</p>
                        <p class="text-lg text-gray-900">{{ $profesor->departamento }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-500 uppercase">Teléfono</p>
                        <p class="text-lg text-gray-900">{{ $profesor->telefono ?? 'No especificado' }}</p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-500 uppercase">Rol</p>
                        <p class="text-lg">
                            @if($profesor->es_coordinador_tde)
                                <span class="bg-green-200 text-green-800 px-3 py-1 rounded font-semibold">
                                    Coordinador TDE
                                </span>
                            @else
                                <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded font-semibold">
                                    Profesor
                                </span>
                            @endif
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-500 uppercase">Fecha de Registro</p>
                        <p class="text-lg text-gray-900">{{ $profesor->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-xl font-bold mb-4 text-gray-700 border-b pb-2">Estadísticas de Incidencias</h2>
                
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-blue-50 p-4 rounded text-center">
                        <p class="text-sm font-semibold text-blue-600 uppercase">Total Incidencias</p>
                        <p class="text-3xl font-bold text-blue-900 mt-2">{{ $profesor->incidencias->count() }}</p>
                    </div>

                    <div class="bg-yellow-50 p-4 rounded text-center">
                        <p class="text-sm font-semibold text-yellow-600 uppercase">Pendientes</p>
                        <p class="text-3xl font-bold text-yellow-900 mt-2">{{ $profesor->incidencias->where('estado', 'pendiente')->count() }}</p>
                    </div>

                    <div class="bg-green-50 p-4 rounded text-center">
                        <p class="text-sm font-semibold text-green-600 uppercase">Resueltas</p>
                        <p class="text-3xl font-bold text-green-900 mt-2">{{ $profesor->incidencias->where('estado', 'resuelta')->count() }}</p>
                    </div>
                </div>
            </div>

            @if($profesor->es_coordinador_tde)
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-xl font-bold mb-4 text-gray-700 border-b pb-2">Como Coordinador TDE</h2>
                
                <div class="bg-green-50 p-4 rounded text-center">
                    <p class="text-sm font-semibold text-green-600 uppercase">Incidencias Resueltas</p>
                    <p class="text-3xl font-bold text-green-900 mt-2">{{ $profesor->incidenciasResueltas->count() }}</p>
                </div>
            </div>
            @endif

            <div class="flex justify-between">
                <div class="space-x-2">
                    <a href="{{ route('profesores.edit', $profesor) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Editar
                    </a>
                </div>
                
                <form action="{{ route('profesores.destroy', $profesor) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('¿Estás seguro de eliminar este profesor?')">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>