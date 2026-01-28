<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Editar Profesor</h1>
                <a href="{{ route('profesores.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Volver
                </a>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('profesores.update', $profesor) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nombre *</label>
                        <input type="text" name="nombre" value="{{ old('nombre', $profesor->nombre) }}" required
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nombre') border-red-500 @enderror">
                        @error('nombre')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Apellidos *</label>
                        <input type="text" name="apellidos" value="{{ old('apellidos', $profesor->apellidos) }}" required
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('apellidos') border-red-500 @enderror">
                        @error('apellidos')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Email *</label>
                        <input type="email" name="email" value="{{ old('email', $profesor->email) }}" required
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Departamento *</label>
                        <input type="text" name="departamento" value="{{ old('departamento', $profesor->departamento) }}" required
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('departamento') border-red-500 @enderror">
                        @error('departamento')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Teléfono</label>
                        <input type="text" name="telefono" value="{{ old('telefono', $profesor->telefono) }}"
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="es_coordinador_tde" value="1" 
                                {{ old('es_coordinador_tde', $profesor->es_coordinador_tde) ? 'checked' : '' }}
                                class="mr-2">
                            <span class="text-gray-700">¿Es Coordinador TDE?</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded">
                        Actualizar Profesor
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>