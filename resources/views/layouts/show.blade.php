<x-app-layout>

@section('title', 'Product Details')

<div style="padding:40px; max-width:900px; margin:auto; color:white;">

    @php
        use Illuminate\Support\Str;
        $src = Str::startsWith($product->image, 'http')
            ? $product->image
            : asset('storage/'.$product->image);
    @endphp

    <div style="display:flex; gap:20px; background:#1a1a1a; padding:20px; border-radius:12px; align-items:center;">

    <img src="{{ $src }}" width="90" style="border-radius:8px;">

    <div style="flex:1;">
        <h2 style="font-size:20px; margin-bottom:5px;">{{ $item['name'] }}</h2>
        <p style="color:#bbb;">{{ number_format($item['price'], 0, ',', ' ') }} FCFA</p>
    </div>

    <form action="{{ route('cart.update', $id) }}" method="POST">
        @csrf
        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1"
               style="width:70px; padding:8px; border-radius:6px;">
        <button style="background:#4CAF50; padding:8px 12px; border:none; color:white; border-radius:6px;">
            OK
        </button>
    </form>

    <div style="font-size:18px; font-weight:700;">
        {{ number_format($itemTotal, 0, ',', ' ') }} FCFA
    </div>

    <a href="{{ route('cart.remove', $id) }}"
       style="color:#e63946; font-size:18px; margin-left:15px;">
        ✕
    </a>

</div>

</div>

</x-app-layout>