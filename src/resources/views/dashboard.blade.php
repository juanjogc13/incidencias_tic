<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Incidencias TIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">Dashboard - Incidencias TIC</h1>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Cerrar Sesión
                </button>
            </form>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">Bienvenido, {{ Auth::user()->name }}!</h2>
            <p class="text-gray-600">Email: {{ Auth::user()->email }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('profesores.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white rounded-lg p-6 text-center transform transition hover:scale-105">
                <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                </svg>
                <h3 class="text-xl font-bold">Profesores</h3>
                <p class="mt-2">Gestionar profesores del centro</p>
            </a>

            <div class="bg-green-500 hover:bg-green-700 text-white rounded-lg p-6 text-center opacity-50 cursor-not-allowed">
                <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <h3 class="text-xl font-bold">Incidencias</h3>
                <p class="mt-2">Próximamente...</p>
            </div>

            <div class="bg-purple-500 hover:bg-purple-700 text-white rounded-lg p-6 text-center opacity-50 cursor-not-allowed">
                <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z"/>
                    <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z"/>
                    <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z"/>
                </svg>
                <h3 class="text-xl font-bold">Dispositivos</h3>
                <p class="mt-2">Próximamente...</p>
            </div>
        </div>

        <div class="mt-8 bg-white shadow-md rounded-lg p-6">
            <h3 class="text-xl font-bold mb-4">Estadísticas Rápidas</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-blue-100 p-4 rounded text-center">
                    <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Profesor::count() }}</p>
                    <p class="text-gray-600">Profesores</p>
                </div>
                <div class="bg-green-100 p-4 rounded text-center">
                    <p class="text-3xl font-bold text-green-600">{{ \App\Models\Incidencia::count() }}</p>
                    <p class="text-gray-600">Incidencias</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded text-center">
                    <p class="text-3xl font-bold text-yellow-600">{{ \App\Models\Aula::count() }}</p>
                    <p class="text-gray-600">Aulas</p>
                </div>
                <div class="bg-purple-100 p-4 rounded text-center">
                    <p class="text-3xl font-bold text-purple-600">{{ \App\Models\Dispositivo::count() }}</p>
                    <p class="text-gray-600">Dispositivos</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>