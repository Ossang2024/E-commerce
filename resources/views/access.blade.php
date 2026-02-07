<x-app-layout>

@section('title', 'Accès Restreint')

<div style="padding:40px; max-width:400px; margin:auto; color:white;">

    <h1 style="font-size:24px; margin-bottom:20px;">Entrer le code d’accès</h1>

    @if(session('error'))
        <p style="color:#e63946; margin-bottom:15px;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('access.check') }}" method="POST">
        @csrf

        <input type="password" name="code"
               placeholder="Code secret"
               style="width:100%; padding:12px; border-radius:6px; margin-bottom:20px;">

        <button type="submit"
                style="background:#4CAF50; padding:12px 20px; color:white; border:none; border-radius:6px;">
            Valider
        </button>
    </form>

</div>

</x-app-layout>



