@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Votre Panier')



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

                <div style="display:flex; gap:20px; background:#1a1a1a; padding:20px 10px; border-radius:12px; align-items:center; flex-wrap: wrap;  ">

                    <img src="{{ $src }}" width="90" style="border-radius:8px;">

                    <div style="flex:1;">
                        <h2 style="font-size:20px; margin-bottom:5px;">{{ $item['name'] }}</h2>
                        <p style="color:#bbb;">{{ number_format($item['price'], 0, ',', ' ') }} $</p>
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
                        {{ number_format($itemTotal, 0, ',', ' ') }} $
                    </div>

                    <a href="{{ route('cart.remove', $id) }}"
                        onclick="return confirm('Supprimer ce produit du panier ?')"
                       style="color:#e63946; font-size:18px; margin-left:15px;">
                        ✕
                    </a>

                </div>

            @endforeach

        </div>

        <div style="margin-top:35px; padding-top:20px; border-top:1px solid #333;">
            <h2 style="font-size:30px; margin-bottom:20px;">
                {{-- Total : {{ number_format($total, 0, ',', ' ') }} $ --}}
                Total : <span id="total">{{ $total }} </span> $
            </h2>

            {{-- <a href="#"
               style="background:#4CAF50; padding:15px 25px; border-radius:8px; color:white; text-decoration:none; font-size:18px;">
                Procéder au paiement
            </a> --}}

            <form action="{{ route('checkout.process') }}" method="POST" class="form-checkout">
                @csrf
                <input type="hidden" name="total" value="{{ $total }}">
                {{-- <input type="hidden" name="payment_method" id="payment_method_input"> --}}
                <button type="submit" style="background:#4CAF50; padding:15px 25px; border-radius:8px; color:white; text-decoration:none; font-size:18px;">CHECKOUT</button>
            </form>

        </div>


        <div class="payment-methods">
            <h3>Méthode de paiement</h3>

            <label>
                <input type="radio" name="payment_method" value="cash" checked>
                Cash (0% de frais)
            </label>

            <label>
                <input type="radio" name="payment_method" value="cashapp">
                CashApp (+5% de frais)
            </label>

            <label>
                <input type="radio" name="payment_method" value="crypto">
                USDT / BTC (+3% de frais)
            </label>
        </div>


        <style>
            .form-checkout {
                margin-top: 10px;
            }

            .form-checkout button {
                background: #4CAF50;
                padding: 15px 25px;
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 18px;
                cursor: pointer;
            }

            .form-checkout button:hover {
                background: #45a049;
            }
        </style>


        <script>
            document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
                radio.addEventListener('change', () => {
                    document.getElementById('payment_method_input').value = radio.value;
                });
            });
        </script>


         <style>
            .payment-methods {
                margin-top: 30px;
                padding: 20px;
                background: #1a1a1a;
                border-radius: 12px;
            }

            .payment-methods h3 {
                margin-bottom: 15px;
            }

            .payment-methods label {
                display: block;
                margin-bottom: 10px;
                font-size: 16px;
            }

            .payment-methods input[type="radio"] {
                margin-right: 10px;
            }
        </style>

        <script>
            const baseTotal = {{ $total }}; // total sans frais
            const totalDisplay = document.getElementById('total');

            document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
                radio.addEventListener('change', () => {
                    let fee = 0;

                    if (radio.value === 'cashapp') fee = 0.05;
                    if (radio.value === 'crypto') fee = 0.03;

                    const finalTotal = baseTotal + (baseTotal * fee);
                    totalDisplay.textContent = finalTotal.toFixed(2) ;
                });
            });
        </script>

    @endif

</div>

</x-app-layout>