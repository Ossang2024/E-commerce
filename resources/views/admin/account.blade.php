<x-app-layout>

<div style="padding:40px; color:white; max-width:700px; margin:auto;">

    <h1 style="font-size:28px; font-weight:700; margin-bottom:25px;">
        Gestion du compte administrateur
    </h1>

    <p style="color:#bbb; margin-bottom:30px;">
        Modifiez vos informations personnelles, votre email ou votre mot de passe.
    </p>

    {{-- INFORMATIONS PERSONNELLES --}}
    <div style="background:#1f1f1f; padding:25px; border-radius:10px; margin-bottom:30px;">
        <h2 style="font-size:20px; margin-bottom:15px;">Informations personnelles</h2>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <label>Nom</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}"
                   style=" width:100%; padding:10px; margin-bottom:15px; border-radius:6px;">

            <label>Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}"
                   style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px;">

            <button type="submit"
                    style="background:#4CAF50; padding:12px 20px; color:white; border:none; border-radius:6px;">
                Mettre à jour
            </button>
        </form>
    </div>

    {{-- MOT DE PASSE --}}
    <div style="background:#1f1f1f; padding:25px; border-radius:10px;">
        <h2 style="font-size:20px; margin-bottom:15px;">Changer le mot de passe</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <label>Mot de passe actuel</label>
            <input type="password" name="current_password"
                   style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px;">

            <label>Nouveau mot de passe</label>
            <input type="password" name="password"
                   style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px;">

            <label>Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation"
                   style="width:100%; padding:10px; margin-bottom:15px; border-radius:6px;">

            <button type="submit"
                    style="background:#4CAF50; padding:12px 20px; color:white; border:none; border-radius:6px;">
                Mettre à jour le mot de passe
            </button>
        </form>
    </div>

    <style>
        input {
            border: 1px solid #333;
            color: #212121;
            font-size: 15px;
            font-weight: 500;
        }
    </style>

</div>

</x-app-layout>