<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('products', function () {
    $products = Product::orderBy('created_at', 'desc')->get();
    return view('products.lista', compact('products'));
})->name('products.lista');

Route::get('products/create', function () {
    return view('products.create');
})->name('products.create');

Route::post('products', function (Request $request) {
    $newProduct =  new Product();
    $newProduct->description = $request->input('description');
    $newProduct->price = $request->input('price');
    $newProduct->save();
    return redirect()->route('products.lista')->with('info', 'producto creado exitosamente');
})->name('products.store');

Route::delete('products/{id}', function ($id) {
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('products.lista')->with('info', 'producto eliminado exitosamente');
})->name('products.delete');

Route::get('products/{id}/edit', function ($id) {
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
})->name('products.edit');

route::put('/products/{id}', function ($id, Request $request) {
    $product = Product::findOrFail($id);
    $product->Description = $request->input('description');
    $product->price = $request->input('price');
    $product->save();
    return redirect()->route('products.lista')->with('info', 'producto editado exitosamente');
})->name('products.update');
