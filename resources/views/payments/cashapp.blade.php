@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Paiement en CashApp')



<x-app-layout>
    <div class="payment-page">

        <h1>Paiement CashApp</h1>
        <p class="subtitle">Envoyez le paiement via CashApp puis confirmez.</p>

        <div class="payment-box">
            <h3>Informations CashApp</h3>

            <p>Nom CashApp : <strong>$TonCashApp</strong></p>

            <div class="qr-box">
                <p>Scannez le QR Code :</p>
                <img src="/images/cashapp-qr.png" alt="QR CashApp">
            </div>

            <div class="summary">
                <h3>Montant à payer</h3>
                <p><strong>{{ $total }} $</strong> (incluant les frais CashApp)</p>
            </div>

            <a href="{{ route('payment.verify', 'cashapp') }}" class="confirm-btn">J’AI PAYÉ</a>
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