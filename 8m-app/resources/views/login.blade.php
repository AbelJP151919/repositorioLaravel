<x-layout>
    <div class="max-w-md mx-auto mt-10 p-6 bg-white shadow rounded">
        <h1 class="text-2xl font-bold mb-4">Iniciar sesión</h1>

        <form method="POST" action="/login" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1">Email</label>
                <input name="email" type="email" class="border p-2 w-full rounded" required>
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1">Contraseña</label>
                <input name="password" type="password" class="border p-2 w-full rounded" required>
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button class="bg-green-600 text-white px-4 py-2 rounded w-full">
                Entrar
            </button>
        </form>
    </div>
</x-layout>
