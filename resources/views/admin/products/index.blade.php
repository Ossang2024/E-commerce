@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Gestion des Produits')

<x-app-layout>

<div style="padding:40px; color:white;" class="container">

    <h1 style="margin-bottom:25px;">Gestion des Produits</h1>

    <a href="{{ route('admin.products.create') }}"
       style="background:#4CAF50; padding:10px 18px; color:white; text-decoration:none; border-radius:6px;">
        + Ajouter un produit
    </a>

    <table style="width:100%; margin-top:30px; border-collapse:collapse;">
        <thead>
            <tr style="background:#222;">
                <th style="padding:12px; border-bottom:1px solid #333;">Image</th>
                <th style="padding:12px; border-bottom:1px solid #333;">Nom</th>
                <th style="padding:12px; border-bottom:1px solid #333;">Prix</th>
                <th style="padding:12px; border-bottom:1px solid #333;">Catégorie</th>
                <th style="padding:12px; border-bottom:1px solid #333;">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr style="border-bottom:1px solid #333;">
                    <td style="padding:12px;">
                        @if($product->image)
                            @php
                                $src = Str::startsWith($product->image, 'http')
                                    ? $product->image
                                    : asset('storage/'.$product->image);
                            @endphp

                            <img src="{{ $src }}" width="60" style="border-radius:6px;">
                        @endif
                    </td>


                    <td style="padding:12px;">{{ $product->name }}</td>
                    <td style="padding:12px;">{{ $product->price }} $</td>
                    <td style="padding:12px;">{{ $product->category }}</td>

                    <td style="padding:12px;">
                        <a href="{{ route('admin.products.edit', $product) }}"
                           style="color:#4CAF50; margin-right:15px;">Modifier</a>

                        <form action="{{ route('admin.products.destroy', $product) }}"
                              method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Supprimer ce produit ?')"
                                    style="color:#e63946; background:none; border:none; cursor:pointer;">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

</x-app-layout>