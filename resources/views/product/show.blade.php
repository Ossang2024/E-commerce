@php
    use Illuminate\Support\Str;
@endphp

@section('title', $product->name)

<x-app-layout>

<div style="padding:40px; max-width:900px; margin:auto; color:white;">

    @php
        $src = Str::startsWith($product->image, 'http')
            ? $product->image
            : asset('storage/'.$product->image);
    @endphp

    <div style="display:flex; gap:40px; flex-wrap:wrap;">

        <div style="flex:1; min-width:280px;" class="zoom-wrapper">
            <img src="{{ $src }}" style="width:100%; border-radius:12px;" class="zoom-img">
        </div>

        <div style="flex:1; min-width:280px;">
            <h1 style="font-size:32px; margin-bottom:15px; text-transform:uppercase;">{{ $product->name }}</h1>

            <p style="color:#bbb; margin-bottom:20px;">
                {{ $product->description }}
            </p>

            <p style="font-size:26px; font-weight:700; margin-bottom:25px;">
                {{ number_format($product->price, 0, ',', ' ') }} $
            </p>

            <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf

                <label>Quantité</label>
                <input type="number" name="quantity" value="1" min="1"
                       style="width:80px; padding:10px; margin-bottom:20px; border-radius:6px; color:#111; fsont-size:16px; font-weight:600;">

                <button type="submit"
                        style="background:#4CAF50; padding:15px 25px; color:white; border:none; border-radius:8px; font-size:16px;">
                    Ajouter au panier
                </button>
            </form>
        </div>

    </div>

    <style>
        .zoom-wrapper {
            position: relative;
            overflow: hidden;
            width: 100%;
            border-radius: 12px;
            cursor: zoom-in;
        }

        .zoom-img {
            width: 100%;
            transition: transform 0.2s ease-out;
            transform-origin: center center;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const wrapper = document.querySelector(".zoom-wrapper");
            const img = document.querySelector(".zoom-img");

            wrapper.addEventListener("mousemove", function (e) {
                const rect = wrapper.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;

                img.style.transform = "scale(2.5)";
                img.style.transformOrigin = `${x}% ${y}%`;
            });

            wrapper.addEventListener("mouseleave", function () {
                img.style.transform = "scale(1)";
                img.style.transformOrigin = "center center";
            });
        });
    </script>

</div>

</x-app-layout>