@props(["champ"])

@error($champ)
    <p class="msg_erreur bg-red-500 text-white px-4 py-2 rounded">{{ $message }}</p>
@enderror
