@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Paiement en Crypto')



<x-app-layout>
    <div class="payment-page">

        <h1>Paiement Crypto</h1>
        <p class="subtitle">Envoyez le montant en USDT ou BTC puis confirmez.</p>

        <div class="payment-box">
            <h3>Adresse USDT (TRC20)</h3>
            <p class="address">TX8F9...A92KD</p>

            <div class="qr-box">
                <img src="/images/usdt-qr.png" alt="QR USDT">
            </div>

            <h3>Adresse BTC</h3>
            <p class="address">bc1q9...8d92</p>

            <div class="qr-box">
                <img src="/images/btc-qr.png" alt="QR BTC">
            </div>

            <div class="summary">
                <h3>Montant à payer</h3>
                <p><strong>{{ $total }} $</strong> (incluant les frais crypto)</p>
            </div>

            <a href="{{ route('payment.verify', 'crypto') }}" class="confirm-btn">J’AI PAYÉ</a>
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
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #eee;
        }
        .address {
            font-family: monospace;
            background: #f7f7f7;
            padding: 10px;
            border-radius: 8px;
            word-break: break-all;
        }
        .qr-box {
            text-align: center;
            margin: 20px 0;
        }
        .qr-box img {
            width: 180px;
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