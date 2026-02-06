<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->price) {
            if ($request->price == 'low') {
                $query->where('price', '<', 20);
            } elseif ($request->price == 'mid') {
                $query->whereBetween('price', [20, 50]);
            } elseif ($request->price == 'high') {
                $query->where('price', '>', 50);
            }
        }

        $products = $query->get();

        return view('menu', compact('products'));
    }


    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function updateQuantity(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, (int)$request->quantity);
            session()->put('cart', $cart);
        }

        return back();
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back();
    }

    public function addToCart(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        $quantity = $request->quantity ?? 1;

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }
}

