<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// Show products page
// Route::get('/', function () {
//     return view('welcome');
// });


// Root pe hi products list
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// Create
Route::get('/create', [ProductController::class, 'create'])->name('products.create');

// Store
Route::post('/store', [ProductController::class, 'store'])->name('products.store');

// Edit
Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');

// Update
Route::put('/update/{id}', [ProductController::class, 'update'])->name('products.update');

// Delete
Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// Product details page
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');