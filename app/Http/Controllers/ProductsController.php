<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::paginate(20);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titleBtn = 'Nuevo Producto';
        $route = route('products.store');
        $method = 'POST';
        $product = new Products;

        return view('products.new', compact('titleBtn', 'route', 'method', 'product'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'points' => 'required|numeric',
            'description' => 'required'
        ]);

        Products::create(request(['name', 'points', 'description']));

        return back()->with('message', ['success', 'Producto creado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        $titleBtn = 'Editar Producto';
        $route = route('products.update', ['products' => $products->id]);
        $method = 'PUT';
        $product = $products;

        return view('products.edit', compact('titleBtn', 'route', 'method', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        $this->validate($request, [
            'name' => 'required',
            'points' => 'required|numeric',
            'description' => 'required'
        ]);

        $products->fill(request(['name', 'points', 'description']))->save();

        return back()->with('message', ['success', 'Producto actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        $products->delete();

        return back()->with('message', ['success', 'Producto eliminado correctamente']);
    }
}
