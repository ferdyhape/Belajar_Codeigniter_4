<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function index()
    {
        // $productsWithCategory = new \App\Models\ProductWithCategory();
        // $products = $productsWithCategory->getProductCategory();

        $products = new \App\Models\ProductModel();
        $products = $products->getAllProductWithCategory();
        // dd($product);

        return view('product/index', [
            'products' => $products,
        ]);
    }
    public function detail($id)
    {
        $product = new \App\Models\ProductModel();
        $product = $product->productWithCategory($id);
        // dd($product);

        return view('product/detail', [
            'product' => $product,
        ]);
    }
}
