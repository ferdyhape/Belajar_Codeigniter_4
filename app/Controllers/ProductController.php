<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function index()
    {
        $productsWithCategory = new \App\Models\ProductWithCategory();
        $products = $productsWithCategory->getProductCategory();
        // dd($products);
        return view('product/index', [
            'products' => $products,
        ]);
    }
}
