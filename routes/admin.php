<?php

use Illuminate\Support\Facades\Route;

// admin routes;
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\Admin\MainController::class, 'index'])->middleware(['auth.admin'])->name('admin');

    Route::group(['prefix' => 'tickets'], function () {
        Route::get('/', [App\Http\Controllers\Admin\TicketsController::class, 'index'])->middleware(['auth.admin'])->name('admin.tickets');
        Route::get('/create', [App\Http\Controllers\Admin\TicketsController::class, 'create'])->middleware(['auth.admin'])->name('admin.tickets.create');
        Route::post('/create', [App\Http\Controllers\Admin\TicketsController::class, 'store'])->middleware(['auth.admin'])->name('admin.tickets.store');
        Route::get('/{id}', [App\Http\Controllers\Admin\TicketsController::class, 'show'])->middleware(['auth.admin'])->name('admin.tickets.show');
        Route::post('/{id}/status', [App\Http\Controllers\Admin\TicketsController::class, 'status'])->middleware(['auth.admin'])->name('admin.tickets.status');
        Route::post('/{id}/reply', [App\Http\Controllers\Admin\TicketsController::class, 'reply'])->middleware(['auth.admin'])->name('admin.tickets.reply');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->middleware(['auth.admin', 'password.confirm'])->name('admin.settings');
        Route::post('/', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->middleware(['auth.admin', 'password.confirm'])->name('admin.settings.update');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->middleware(['auth.admin'])->name('admin.products');
        Route::get('/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->middleware(['auth.admin'])->name('admin.products.create');
        Route::post('/create', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->middleware(['auth.admin'])->name('admin.products.store');
        Route::get('/{product}/edit', [App\Http\Controllers\Admin\ProductsController::class, 'edit'])->middleware(['auth.admin'])->name('admin.products.edit');
        Route::post('/{product}/edit', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->middleware(['auth.admin'])->name('admin.products.update');
        Route::get('/{product}/extension', [App\Http\Controllers\Admin\ProductsController::class, 'extension'])->middleware(['auth.admin'])->name('admin.products.extension');
        Route::post('/{product}/extension', [App\Http\Controllers\Admin\ProductsController::class, 'extensionUpdate'])->middleware(['auth.admin'])->name('admin.products.extension.update');
        Route::delete('/{product}/delete', [App\Http\Controllers\Admin\ProductsController::class, 'destroy'])->middleware(['auth.admin'])->name('admin.products.destroy');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->middleware(['auth.admin'])->name('admin.categories');
        Route::get('/create', [App\Http\Controllers\Admin\CategoriesController::class, 'create'])->middleware(['auth.admin'])->name('admin.categories.create');
        Route::post('/create', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->middleware(['auth.admin'])->name('admin.categories.store');
        Route::get('/{id}', [App\Http\Controllers\Admin\CategoriesController::class, 'show'])->middleware(['auth.admin'])->name('admin.categories.show');
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\CategoriesController::class, 'edit'])->middleware(['auth.admin'])->name('admin.categories.edit');
        Route::post('/{id}/edit', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->middleware(['auth.admin'])->name('admin.categories.update');
        Route::delete('/{id}/delete', [App\Http\Controllers\Admin\CategoriesController::class, 'destroy'])->middleware(['auth.admin'])->name('admin.categories.delete');
    });

    Route::group(['prefix' => 'extensions'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ExtensionsController::class, 'index'])->middleware(['auth.admin', 'password.confirm'])->name('admin.extensions');
        Route::get('/edit/{sort}/{name}', [App\Http\Controllers\Admin\ExtensionsController::class, 'edit'])->middleware(['auth.admin', 'password.confirm'])->name('admin.extensions.edit');
        Route::post('/edit/{sort}/{name}', [App\Http\Controllers\Admin\ExtensionsController::class, 'update'])->middleware(['auth.admin', 'password.confirm'])->name('admin.extensions.update');
    });

    Route::group(['prefix' => 'import'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ImportController::class, 'index'])->middleware(['auth.admin', 'password.confirm'])->name('admin.import');
        Route::post('/', [App\Http\Controllers\Admin\ImportController::class, 'import'])->middleware(['auth.admin', 'password.confirm'])->name('admin.import.import');
    });

    Route::group(['prefix' => 'clients'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ClientsController::class, 'index'])->middleware(['auth.admin'])->name('admin.clients');
        Route::get('/create', [App\Http\Controllers\Admin\ClientsController::class, 'create'])->middleware(['auth.admin'])->name('admin.clients.create');
        Route::post('/create', [App\Http\Controllers\Admin\ClientsController::class, 'store'])->middleware(['auth.admin'])->name('admin.clients.store');
        Route::get('/{id}', [App\Http\Controllers\Admin\ClientsController::class, 'show'])->middleware(['auth.admin'])->name('admin.clients.show');
        Route::get('/{id}/login', [App\Http\Controllers\Admin\ClientsController::class, 'loginasClient'])->middleware(['auth.admin'])->name('admin.clients.loginasclient');
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\ClientsController::class, 'edit'])->middleware(['auth.admin'])->name('admin.clients.edit');
        Route::put('/{id}/edit', [App\Http\Controllers\Admin\ClientsController::class, 'update'])->middleware(['auth.admin'])->name('admin.clients.update');
        Route::delete('/{id}/delete', [App\Http\Controllers\Admin\ClientsController::class, 'destroy'])->middleware(['auth.admin'])->name('admin.clients.delete');
    });

    Route::group(['prefix'=> 'orders'], function(){
        Route::get('/', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->middleware(['auth.admin'])->name('admin.orders');
        Route::delete('/{id}/delete', [App\Http\Controllers\Admin\OrdersController::class, 'destroy'])->middleware(['auth.admin'])->name('admin.orders.delete');        
    });
});
