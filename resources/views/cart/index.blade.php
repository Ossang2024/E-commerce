@php
    use Illuminate\Support\Str;
@endphp



<x-app-layout>

<div style="padding:40px; max-width:900px; margin:auto; color:white;">

    <h1 style="font-size:32px; margin-bottom:25px;">Votre panier</h1>

    @if(count($cart) === 0)
        <p style="color:#bbb; font-size:18px;">Votre panier est vide.</p>
    @else

        <div style="display:flex; flex-direction:column; gap:25px;">

            @php $total = 0; @endphp

            @foreach($cart as $id => $item)

                @php
                    $itemTotal = $item['price'] * $item['quantity'];
                    $total += $itemTotal;

                    $src = Str::startsWith($item['image'], 'http')
                        ? $item['image']
                        : asset('storage/'.$item['image']);
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
                               style="width:70px; padding:8px; border-radius:6px; color:#111; font-size:16px; font-weight:600;">
                        <button style="background:#4CAF50; padding:8px 12px; border:none; color:white; border-radius:6px;">
                            OK
                        </button>
                    </form>

                    <div style="font-size:18px; font-weight:700;">
                        {{ number_format($itemTotal, 0, ',', ' ') }} %
                    </div>

                    <a href="{{ route('cart.remove', $id) }}"
                       style="color:#e63946; font-size:18px; margin-left:15px;">
                        ✕
                    </a>

                </div>

            @endforeach

        </div>

        <div style="margin-top:35px; padding-top:20px; border-top:1px solid #333;">
            <h2 style="font-size:24px; margin-bottom:15px;">
                Total : {{ number_format($total, 0, ',', ' ') }} FCFA
            </h2>

            <a href="#"
               style="background:#4CAF50; padding:15px 25px; border-radius:8px; color:white; text-decoration:none; font-size:18px;">
                Procéder au paiement
            </a>
        </div>

    @endif

</div>

</x-app-layout>