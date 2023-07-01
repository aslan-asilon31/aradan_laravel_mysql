<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;



// Route::resource('product', ProductController::class);

// Show all product
Route::get('product', [ProductController::class, 'index']);

// Show the form to create a new product
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');

// Store a newly created product in the database
Route::post('product', [ProductController::class, 'store'])->name('product.store');

// Show the details of a specific product
Route::get('product/{product}', [ProductController::class, 'show'])->name('product.show');

// Show the form to edit an existing product
Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

// Update the specified product in the database
Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');

// Delete the specified product from the database
Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');