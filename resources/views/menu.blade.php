@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Menu')

<x-app-layout>

<div class="menu-container">

    <h1 class="menu-title">Menu</h1>

    <!-- BARRE DE RECHERCHE + FILTRES -->
    <form method="GET" action="/menu" class="filters">

        <input type="text" name="search" placeholder="Rechercher un produit..."
               value="{{ request('search') }}" class="search-input">

        <select name="category" class="filter-select">
            <option value="">Toutes les catégories</option>
            <option value="flower" {{ request('category')=='flower' ? 'selected' : '' }}>Flower</option>
            <option value="carts" {{ request('category')=='carts' ? 'selected' : '' }}>Carts</option>
            <option value="concentrates" {{ request('category')=='concentrates' ? 'selected' : '' }}>Concentrates</option>
            <option value="pre-rolls" {{ request('category')=='pre-rolls' ? 'selected' : '' }}>Pre-rolls</option>
            <option value="edibles" {{ request('category')=='edibles' ? 'selected' : '' }}>Edibles</option>
        </select>

        <select name="price" class="filter-select">
            <option value="">Tous les prix</option>
            <option value="low" {{ request('price')=='low' ? 'selected' : '' }}>Moins de 20$</option>
            <option value="mid" {{ request('price')=='mid' ? 'selected' : '' }}>20$ - 50$</option>
            <option value="high" {{ request('price')=='high' ? 'selected' : '' }}>Plus de 50$</option>
        </select>

        <button class="filter-btn">Filtrer</button>
    </form>

    <!-- AFFICHAGE DES PRODUITS -->
    <div class="products-grid">

        @forelse($products as $product)
            <a href="{{ route('product.show', $product) }}" style="text-decoration:none; color:white;">
                <div class="product-card">
                    {{-- <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"> --}}
                    @if(Str::startsWith($product->image, 'http'))
                        <img src="{{ $product->image }}" width="100">
                    @else
                        <img src="{{ asset('storage/'.$product->image) }}" width="100">
                    @endif
                    <h3 style="text-transform:uppercase;">{{ $product->name }}</h3>
                    <p class="price">{{ $product->price }} $</p>
                    <p class="category" style="text-transform: uppercase">{{ strtoupper($product->category) }}</p>
                </div>
            </a>
        @empty
            <p class="no-results">Aucun produit trouvé.</p>
        @endforelse

    </div>

</div>

<style>

    .menu-container {
        padding: 40px 20px;
        color: #fff;
        background: #111;
        min-height: 100vh;
    }

    .menu-title {
        text-align: center;
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 30px;
    }

    /* FILTRES */
    .filters {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .search-input,
    .filter-select {
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #444;
        background: #222;
        color: #fff;
        min-width: 180px;
    }

    .filter-btn {
        padding: 10px 20px;
        background: #4CAF50;
        border: none;
        border-radius: 6px;
        color: #fff;
        cursor: pointer;
        font-weight: 600;
    }

    .filter-btn:hover {
        background: #43a047;
    }

    /* PRODUITS */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 25px;
        max-width: 1100px;
        margin: auto;
    }

    .product-card {
        background: #1f1f1f;
        padding: 0px 0px 10px 0px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.4);
        transition: transform 0.2s;
        max-width: 250px;
    }

    .product-card:hover {
        transform: translateY(-6px);
    }

    .product-card img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .product-card h3 {
        font-size: 18px;
        margin-bottom: 5px;
    }

    .price {
        color: #4CAF50;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .category {
        font-size: 12px;
        color: #aaa;
    }

    .no-results {
        text-align: center;
        margin-top: 40px;
        font-size: 18px;
        color: #aaa;
    }

    @media (max-width: 700px) {
        .filters {
            flex-direction: column;
            align-items: center;
        }

        .search-input,
        .filter-select {
            width: 100%;
            max-width: 300px;
        }

        .products-grid {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap
        }

        .product-card img{
            object-fit: cover;
        }
    }

</style>

</x-app-layout>