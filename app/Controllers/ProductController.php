<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Controllers\BaseController;

class ProductController extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }
    public function index()
    {
        $products = $this->productModel->getAllProductWithCategory();

        return view('product/index', [
            'products' => $products,
        ]);
    }
    public function detail($id)
    {
        $product = $this->productModel->productWithCategory($id);
        return view('product/detail', [
            'product' => $product,
            'validation' => \Config\Services::validation(),
        ]);
    }
    public function store()
    {
        // validasi input
        if (!$this->validate([
            // contoh validasi menggunakan custom message
            // 'name' => [
            //     'rules' => 'required|min_length[3]|max_length[255]',
            //     'errors' => [
            //         'required' => 'nama product harus diisi',
            //         'min_length' => 'panjang karakter {field} minimal 3',
            //         'max_length' => 'panjang karakter {field} maksimal 255',
            //     ],
            // ],
            'name' => 'required|min_length[3]|max_length[255]',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'image' => 'required|min_length[3]|max_length[255]',
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            // session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/product/create')->withInput()->with('errors', $validation->getErrors());
        }

        $product = $this->productModel;
        $product->save([
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'category_id' => $this->request->getVar('category_id'),
            'image' => $this->request->getVar('image'),
        ]);

        session()->setFlashdata('success', 'Product has been created');
        return redirect()->to('/product');
    }
    public function create()
    {
        $categories = $this->categoryModel->findAll();

        $session = \Config\Services::session();
        $errors = $session->getFlashdata('errors');

        return view('product/create', [
            'categories' => $categories,
            'errors' => $errors,
        ]);
    }
}
