<x-layout titre="Connexion">
    <div class="flex justify-center items-center h-screen bg-gray-900">
        <div class="w-full max-w-md p-6 bg-gray-800 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-white mb-4">Se connecter</h2>

            @if (session('email'))
                <p class="text-white mb-4">{{ session('email') }}</p>
            @endif

            <form action="{{ route('connexion.authentifier') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-white text-sm font-medium mb-1">Courriel</label>
                    <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}"
                        class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring">
                    <x-forms.erreur champ="email" />
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-white text-sm font-medium mb-1">Mot de passe</label>
                    <input id="password" name="password" type="password" autocomplete="current-password"
                        class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring">
                    <x-forms.erreur champ="password" />
                </div>

                <div class="mb-6">
                    <button type="submit"
                        class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500 focus:outline-none focus:ring">
                        Connectez-vous!
                    </button>
                </div>
            </form>

            <p class="text-gray-300 text-sm">Pas un membre? <a href="{{ route('enregistrement.create') }}"
                    class="text-blue-500 hover:underline">Inscrivez-vous ici</a></p>
        </div>
    </div>
</x-layout>
