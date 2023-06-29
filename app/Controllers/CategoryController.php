<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = new CategoryModel();
        return view('category/index', [
            'categories' => $categories->findAll(),
        ]);
    }
}
