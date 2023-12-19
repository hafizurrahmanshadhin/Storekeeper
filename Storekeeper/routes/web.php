<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

route::get('/', [ProductController::class, 'index'])->name('products.index');
route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
route::get('/products/{id}/edit', [ProductController::class, 'edit']);
route::put('/products/{id}/update', [ProductController::class, 'update']);
route::get('/products/{id}/delete', [ProductController::class, 'destroy']);
Route::get('/products/{id}/show', [ProductController::class, 'show']);
