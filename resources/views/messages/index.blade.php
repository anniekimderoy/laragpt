<x-layout titre="Conversation avec Laragpt">
    <div class="bg-gray-900 text-white min-h-screen py-10">
        {{-- Entête --}}
        <header class="flex justify-between items-center px-6">
            <h1 class="text-2xl font-semibold">Votre conversation avec LaraGPT</h1>
            {{-- Message de confirmation de connexion --}}
            <x-forms.succes cle="succes" />
            <form action="{{ route('deconnexion') }}" method="POST">
                @csrf
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-500 focus:outline-none focus:ring">
                    Déconnexion
                </button>
            </form>
        </header>

        {{-- Principal --}}
        <main class="px-6 mt-8">
            <div class="flex justify-center">
                <div class="space-y-4 max-w-md mx-auto overflow-y-auto pr-20"
                    style="max-height: 515px; overflow-x: hidden;">
                    @if ($messages->isEmpty())
                        <p class="text-white">Aucun message actuellement</p>
                    @else
                        {{-- Liste des messages --}}
                        <div class="space-y-4 max-w-md mx-auto">
                            @foreach ($messages->reverse() as $message)
                                {{-- Bulle de réponse --}}
                                <div class="flex items-start justify-start">
                                    <div class="w-8 h-8">
                                        <img src="{{ asset('img/martin-martz-Wa-3T6d0rBo-unsplash.jpg') }}"
                                            alt="Avatar de LaraGPT" class="w-8 h-8 rounded-full">
                                    </div>
                                    <div class="flex flex-col items-start">
                                        <p class="ml-2 mt-1 text-sm">LaraGPT</p>
                                        <div
                                            class="bg-{{ $message->user_id ? 'gray-600' : 'gray-800' }} text-white rounded-lg p-2 shadow-md max-w-xs mb-1">
                                            @if ($message->reponse)
                                                <p class="mt-1">{{ $message->reponse }}</p>
                                            @endif
                                        </div>
                                        <p class="text-xs">{{ $message->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>

                                {{-- Bulle de question --}}
                                <div class="flex items-end justify-end">
                                    <div class="flex flex-col items-end">
                                        <p class="text-xs">{{ $message->created_at->diffForHumans() }}</p>
                                        <div
                                            class="bg-{{ $message->user_id ? 'blue-600' : 'gray-800' }} text-white rounded-lg p-2 shadow-md max-w-xs mb-1">
                                            <p class="mt-1">{{ $message->question }}</p>
                                        </div>
                                        <p class="ml-2 mt-1 text-sm">
                                            {{ $message->user->prenom }} {{ $message->user->nom }}
                                        </p>
                                    </div>
                                    <div class="w-8 h-8 mt-1">
                                        <img src="{{ $message->user->avatar ?? asset('img/profil.jpg') }}"
                                            alt="Avatar de {{ $message->user->prenom }} {{ $message->user->nom }}"
                                            class="w-8 h-8 rounded-full ml-2">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-8">
                {{-- Poser une question --}}
                <form action="{{ route('messages.store') }}" method="POST"
                    class="flex space-x-4 items-center justify-center">
                    @csrf
                    <input type="text" id="nouvelle_question" name="question" required
                        class="w-1/2 p-2 rounded bg-gray-800 text-white focus:outline-none focus:ring"
                        placeholder="Poser une nouvelle question...">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500 focus:outline-none focus:ring">
                        Envoyer
                    </button>
                </form>
            </div>


        </main>
    </div>
</x-layout>
