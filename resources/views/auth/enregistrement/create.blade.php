<x-layout titre="Enregistrement">
    <div class="flex justify-center items-center h-screen bg-gray-900">
        <div class="w-full max-w-md p-6 bg-gray-800 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-white mb-4">Enregistrez-vous</h2>

            <form action="{{ route('enregistrement.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="prenom" class="block text-white text-sm font-medium mb-1">Prénom</label>
                    <input id="prenom" name="prenom" type="text" autocomplete="given-name" autofocus
                        value="{{ old('prenom') }}"
                        class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring">
                    <x-forms.erreur champ="prenom" />
                </div>

                <div class="mb-4">
                    <label for="nom" class="block text-white text-sm font-medium mb-1">Nom</label>
                    <input id="nom" name="nom" type="text" value="{{ old('nom') }}"
                        autocomplete="family-name"
                        class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring">
                    <x-forms.erreur champ="nom" />
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-white text-sm font-medium mb-1">Courriel</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email"
                        class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring">
                    <x-forms.erreur champ="email" />
                </div>

                <div class="mb-4">
                    <label for="avatar" class="block text-white text-sm font-medium mb-1">Avatar (facultatif)</label>
                    <input id="avatar" name="avatar" type="file"
                        class="w-full bg-gray-700 text-white p-2 rounded focus:outline-none focus:ring">
                    <x-forms.erreur champ="avatar" />
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-white text-sm font-medium mb-1">Mot de passe</label>
                    <input id="password" name="password" type="password" autocomplete="current-password"
                        class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring">
                    <x-forms.erreur champ="password" />
                </div>

                <div class="mb-6">
                    <label for="confirm-password" class="block text-white text-sm font-medium mb-1">Confirmation du mot
                        de passe</label>
                    <input id="confirm-password" name="confirmation_password" type="password"
                        class="w-full p-2 rounded bg-gray-700 text-white focus:outline-none focus:ring">
                    <x-forms.erreur champ="confirmation_password" />
                </div>

                <div class="mb-6">
                    <button type="submit"
                        class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500 focus:outline-none focus:ring">
                        Créez votre compte!
                    </button>
                </div>
            </form>

            <p class="text-gray-300 text-sm">Déjà un membre? <a href="{{ route('connexion.create') }}"
                    class="text-blue-500 hover:underline">Connectez-vous ici</a></p>
        </div>
    </div>
</x-layout>
