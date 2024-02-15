@props(["cle"])

@if (session($cle))
    <p class="msg_succes bg-green-500 text-white px-4 py-2 rounded">{{ session($cle) }}</p>
@endif
