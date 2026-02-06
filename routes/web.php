<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/menu', [MenuController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/product/{product}', [MenuController::class, 'show'])->name('product.show');

Route::post('/cart/add/{product}', [MenuController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [MenuController::class, 'cart'])->name('cart.index');

Route::post('/cart/update/{id}', [MenuController::class, 'updateQuantity'])->name('cart.update');
Route::get('/cart/remove/{id}', [MenuController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/access', function () {
    return view('access');
})->name('access');

Route::post('/access', function (Illuminate\Http\Request $request) {
    if ($request->code == '1337') {
        session(['verified_access' => true]);
        return redirect()->route('verify');
    }

    return back()->with('error', 'Code incorrect');
})->name('access.check');

Route::middleware('secret')->group(function () {

    Route::get('/verify', function () {
        return view('verify');
    })->name('verify');

    Route::get('/how-to-order', function () {
        return view('howto');
    })->name('howto');

});

Route::get('/about', function () {
        return view('about');
    })->name('about');

Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/account', function () {
            return view('admin.account');
        })->name('account');

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/products', [ProductAdminController::class, 'index'])
            ->name('products.index');

        Route::get('/products/create', [ProductAdminController::class, 'create'])
            ->name('products.create');

        Route::post('/products', [ProductAdminController::class, 'store'])
            ->name('products.store');

        Route::get('/products/{product}/edit', [ProductAdminController::class, 'edit'])
            ->name('products.edit');

        Route::put('/products/{product}', [ProductAdminController::class, 'update'])
            ->name('products.update');

        Route::delete('/products/{product}', [ProductAdminController::class, 'destroy'])
            ->name('products.destroy');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';