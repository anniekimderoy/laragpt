<x-layout>
    <div class="flex flex-col items-center justify-center h-screen bg-gray-900 text-white">
        {{-- Message de confirmation de déconnexion --}}
        <x-forms.succes cle="succes" />
        <h1 class="text-6xl font-semibold mb-8">Bienvenue sur LaraGPT</h1>
        <div class="flex space-x-6">
            <a href="{{ route('enregistrement.create') }}"
            class="block bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-md transition duration-300 ease-in-out">
            S'inscrire
        </a>
        <a href="{{ route('connexion.create') }}"
                class="block bg-purple-600 hover:bg-purple-700 text-white py-3 px-6 rounded-md transition duration-300 ease-in-out">
                Parler à LaraGPT
            </a>
        </div>
    </div>
</x-layout>
