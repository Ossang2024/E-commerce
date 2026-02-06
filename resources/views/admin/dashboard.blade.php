<x-app-layout>

<div style="padding:40px; color:white;">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; margin:30px 0px ;">
        <h1 style="font-size: 25px">Dashboard Administrateur</h1>

        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        style="background:#e63946; padding:10px 18px; color:white; border:none; border-radius:6px;">
                    Déconnexion
                </button>
            </form>
        </div>
    </div>

    <p style="color:#bbb; margin-bottom:35px; max-width:600px;">
        Bienvenue {{ auth()->user()->name }} dans votre espace d’administration. Gérez vos produits, surveillez l’activité et accédez rapidement aux actions importantes.
    </p>

    {{-- STATISTIQUES --}}
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px,1fr)); gap:25px; margin-bottom:40px;">

        <div style="background:#1f1f1f; padding:20px; border-radius:10px; box-shadow:0 4px 15px rgba(0,0,0,0.4);">
            <h3 style="font-size:18px; color:#aaa;">Produits</h3>
            <p style="font-size:32px; font-weight:700; margin-top:10px;">
                {{ \App\Models\Product::count() }}
            </p>
        </div>

        <div style="background:#1f1f1f; padding:20px; border-radius:10px; box-shadow:0 4px 15px rgba(0,0,0,0.4);">
            <h3 style="font-size:18px; color:#aaa;">Catégories</h3>
            <p style="font-size:32px; font-weight:700; margin-top:10px;">
                {{ \App\Models\Product::distinct('category')->count('category') }}
            </p>
        </div>

        <div style="background:#1f1f1f; padding:20px; border-radius:10px; box-shadow:0 4px 15px rgba(0,0,0,0.4);">
            <h3 style="font-size:18px; color:#aaa;">Dernier produit ajouté</h3>
            <p style="font-size:16px; margin-top:10px; color:#4CAF50;">
                {{ optional(\App\Models\Product::latest()->first())->name ?? 'Aucun produit' }}
            </p>
        </div>

    </div>

    {{-- ACTIONS RAPIDES --}}
    <h2 style="font-size:24px; font-weight:600; margin-bottom:20px;">Actions rapides</h2>

    <div style="display:flex; gap:20px; flex-wrap:wrap;">

        <a href="{{ route('admin.products.create') }}"
           style="background:#4CAF50; padding:15px 25px; border-radius:8px; color:white; text-decoration:none; font-weight:600;">
            + Ajouter un produit
        </a>

        <a href="{{ route('admin.products.index') }}"
           style="background:#1f1f1f; padding:15px 25px; border-radius:8px; color:#4CAF50; text-decoration:none; font-weight:600; border:1px solid #4CAF50;">
            Gérer les produits
        </a>

        <a href="/menu"
           style="background:#1f1f1f; padding:15px 25px; border-radius:8px; color:#4CAF50; text-decoration:none; font-weight:600; border:1px solid #4CAF50;">
            Voir le menu public
        </a>

        <a href="{{ route('admin.account') }}"
            style="background:#1f1f1f; padding:15px 25px; border-radius:8px; color:#4CAF50; text-decoration:none; border:1px solid #4CAF50;">
            Gestion du compte
        </a>

    </div>

</div>

</x-app-layout>