@php
    use Illuminate\Support\Str;
@endphp

@section('title', $product->name)

<x-app-layout>

<div style="padding:40px; color:white;" class="container">

    <h1>Modifier le produit</h1>

    <form action="{{ route('admin.products.update', $product) }}" 
          method="POST" enctype="multipart/form-data" 
          style="margin-top:25px;">
        @csrf
        @method('PUT')

        <label>Nom</label>
        <input type="text" name="name" value="{{ $product->name }}" 
               style="width:100%; padding:10px; margin-bottom:15px;">

        <label>Description</label>
        <textarea name="description" 
                  style="width:100%; padding:10px; margin-bottom:15px;">{{ $product->description }}</textarea>

        <label>Prix</label>
        <input type="number" name="price" value="{{ $product->price }}" 
               style="width:100%; padding:10px; margin-bottom:15px;">

        <label>Catégorie</label>
        <input type="text" name="category" value="{{ $product->category }}" 
               style="width:100%; padding:10px; margin-bottom:15px;">

        <label>Nouvelle image (upload)</label>
        <input type="file" name="image" style="margin-bottom:15px;">

        <label>Lien de l’image (optionnel)</label>
        <input type="text" name="image_url" 
               value="{{ Str::startsWith($product->image, 'http') ? $product->image : '' }}"
               placeholder="https://exemple.com/image.jpg"
               style="width:100%; padding:10px; margin-bottom:15px;">

        <p style="margin-top:10px; margin-bottom:10px;">Image actuelle :</p>

        @php
            $src = Str::startsWith($product->image, 'http')
                ? $product->image
                : asset('storage/'.$product->image);
        @endphp

        <img src="{{ $src }}" width="150" 
             style="border-radius:6px; margin-bottom:20px;">

        <button type="submit"
                style="background:#4CAF50; padding:12px 20px; color:white; border:none; border-radius:6px;">
            Enregistrer
        </button>
    </form>

    <style>

        .container {
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form {
            background: #1f1f1f;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.4);
            max-width: 600px;
        }

        input, textarea {
            border: 1px solid #444;
            color: #212121;
            border-radius: 6px;
            font-weight: 500;
            font-size: 15px;
        }
    </style>
</div>

</x-app-layout>