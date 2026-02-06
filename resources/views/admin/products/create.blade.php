<x-app-layout>

@section('title', 'Ajouter un produit')

<div class="container">
    <h1 class="title">Ajouter un produit</h1>

    @if(session('success'))
        <p style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </p>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf

        <div class="form-group">
            <label>Nom du produit</label>
            <input type="text" name="name" required class="text">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description"  class="text"></textarea>
        </div>

        <div class="form-group">
            <label>Prix ($)</label>
            <input type="number" step="0.01" name="price" required  class="text">
        </div>

        <div class="form-group">
            <label>Catégorie</label>
            <select name="category" required class="text">
                <option value="flower">Flower</option>
                <option value="cartes">Cartes</option>
                <option value="concentrates">Concentrates</option>
                <option value="pre-rolls">Pre-rolls</option>
                <option value="edibles">Edibles</option>
            </select>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image"  class="text">
        </div>


        <div class="form-group">
            <label>Lien de l’image </label>
            <input type="text" name="image_url" placeholder="https://exemple.com/image.jpg" class="text">
        </div>


        <button class="btn-submit">Ajouter</button>
    </form>
</div>

<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
        background-color: #212121;
        justify-content: center;
    }

    .title {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #fff;
    }

    .form {
        background: #454444;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        flex-direction: column;
        width: 100%;
        max-width: 500px;
    }

    .form-group {
        margin-bottom: 18px;
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        margin-bottom: 6px;
        font-weight: 600;
        color: white;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        transition: border-color 0.2s;
        min-width: 450px;
        /* color: #212121 */
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        border-color: #4CAF50;
        outline: none;
    }

    .text {
        color: #212121;
        font-weight: 500;
        font-size: 15px;
    }

    textarea {
        min-height: 100px;
        resize: vertical;
    }

    .btn-submit {
        padding: 12px;
        background: #4CAF50;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.2s;
        width: 100%;
    }

    .btn-submit:hover {
        background: #43a047;
    }
</style>

</x-app-layout>