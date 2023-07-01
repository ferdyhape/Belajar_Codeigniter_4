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

    // index page
    public function index()
    {
        $products = $this->productModel->getAllProductWithCategory();
        return view('product/index', [
            'products' => $products,
        ]);
    }

    // detail page
    public function detail($id)
    {
        $product = $this->productModel->productWithCategory($id);
        return view('product/detail', [
            'product' => $product,
            'validation' => \Config\Services::validation(),
        ]);
    }

    // create page
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

    // store process
    public function store()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'image' => 'uploaded[image]|max_size[image,4096]',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/product/create')->withInput()->with('errors', $validation->getErrors());
        }

        $image = $this->request->getFile('image');
        $newName = $image->getRandomName();
        $image->move('img/product', $newName);
        $newName = 'product/' . $newName;

        $product = $this->productModel;
        $product->save([
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'category_id' => $this->request->getVar('category_id'),
            'image' => $newName,
        ]);

        session()->setFlashdata('success', 'Product has been created');
        return redirect()->to('/product');
    }

    // edit page
    public function edit($id)
    {
        $product = $this->productModel->find($id);
        $categories = $this->categoryModel->findAll();

        $session = \Config\Services::session();
        $errors = $session->getFlashdata('errors');

        return view('product/edit', [
            'product' => $product,
            'categories' => $categories,
            'errors' => $errors,
        ]);
    }

    // update process
    public function update($id)
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'image' => 'max_size[image,4096]',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/product/edit/' . $id)->withInput()->with('errors', $validation->getErrors());
        }

        $product = $this->productModel->find($id);
        $image = $this->request->getFile('image');
        if ($image->getError() == 4) {
            $newName = $product['image'];
        } else {
            if ($product['image'] != 'product/default.jpg') {
                unlink('img/' . $product['image']);
            }
            $newName = $image->getRandomName();
            $image->move('img/product', $newName);
            $newName = 'product/' . $newName;
        }

        $product = $this->productModel;
        $product->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'category_id' => $this->request->getVar('category_id'),
            'image' => $newName,
        ]);

        session()->setFlashdata('success', 'Product has been updated');
        return redirect()->to('/product');
    }

    // delete process
    public function delete($id)
    {
        $product = $this->productModel->find($id);
        if ($product['image'] != 'product/default.jpg') {
            unlink('img/' . $product['image']);
        }
        $this->productModel->delete($id);
        session()->setFlashdata('success', 'Product has been deleted');
        return redirect()->to('/product');
    }
}
