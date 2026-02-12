@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Paiement en Cash')



<x-app-layout>
    <div class="payment-page">

        <h1>Paiement en Cash</h1>
        <p class="subtitle">Vous paierez en espèces lors de la livraison.</p>

        <div class="payment-box">
            <h3>Instructions</h3>
            <p>Préparez le montant exact. Notre livreur vous contactera avant d’arriver.</p>

            <div class="summary">
                <h3>Récapitulatif</h3>
                <p>Total à payer : <strong>{{ $total }} $</strong></p>
            </div>

            <a href="{{ route('order.confirm') }}" class="confirm-btn">CONFIRMER LA COMMANDE</a>
        </div>

    </div>

    <style>
        .payment-page {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            font-family: 'Poppins', sans-serif;
        }
        h1 {
            font-size: 26px;
            font-weight: 700;
        }
        .subtitle {
            color: #666;
            margin-bottom: 25px;
        }
        .payment-box {
            background: #222;
            padding: 25px;
            border-radius: 12px;
        }
        .summary {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }
        .confirm-btn {
            display: block;
            margin-top: 25px;
            padding: 15px;
            background: #000;
            color: #fff;
            text-align: center;
            border-radius: 10px;
            text-decoration: none;
        }
        .confirm-btn:hover {
            background: #333;
        }
    </style>

</x-app-layout>