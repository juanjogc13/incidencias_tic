<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Incidencias TIC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Incidencias TIC</h1>
                <p class="text-gray-600">Inicia sesión en tu cuenta</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-8">
                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus 
                            autocomplete="username"
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password"
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                        >
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Iniciar Sesión
                    </button>

                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                        <div class="text-center mt-4">
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 hover:underline">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                    @endif
                </form>
            </div>

            <div class="text-center mt-6 text-sm text-gray-600">
                <p>Sistema de Gestión de Incidencias TIC</p>
                <p class="mt-1">© 2026 - Todos los derechos reservados</p>
            </div>
        </div>
    </div>
</body>
</html>