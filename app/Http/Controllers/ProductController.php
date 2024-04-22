<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware(
            ['permission:product-list|product-create|product-edit|product-delete'],
            [ 'only'=>['index','show']]
        );

        $this->middleware(
            ['permission:product-create'],
            [ 'only'=>['create','store']]
        );

        $this->middleware(
            ['permission:product-edit'],
            [ 'only'=>['edit','update']]
        );

        $this->middleware(
            ['permission:product-delete'],
            [ 'only'=>['destroy']]
        );

    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
