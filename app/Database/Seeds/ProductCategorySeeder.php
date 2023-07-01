<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        // SEEDER MENGGUNAKAN MODEL
        $categoryModel = new \App\Models\CategoryModel(); //pengambilan model category
        $categories = [
            [
                'name' => 'Category 1',
                'description' => 'This is category 1'
            ],
            [
                'name' => 'Category 2',
                'description' => 'This is category 2'
            ],
            [
                'name' => 'Category 3',
                'description' => 'This is category 3'
            ],
        ];
        $categoryModel->insertBatch($categories); //insert batch untuk memasukkan data sekaligus ke model category

        $productModel = new \App\Models\ProductModel(); //pengambilan model product
        $products = [];
        $categoryCount = count($categories);
        $numberOfProducts = 3; // Number of products to generate
        $productName = ['Keyboard', 'Mouse', 'Laptop'];
        $imageName = ['product/keyboard.jpg', 'product/mouse.jpg', 'product/laptop.jpg'];
        for ($i = 1; $i <= $numberOfProducts; $i++) {
            $categoryIndex = ($i % $categoryCount) + 1;

            $products[] = [
                'name' =>  $productName[$i - 1],
                'image' =>  $imageName[$i - 1],
                'price' => rand(1000000, 20000000),
                'category_id' => $categoryIndex,
            ];
        }
        $productModel->insertBatch($products); //insert batch untuk memasukkan data sekaligus ke model product


        // // SEEDER TANPA MODEL
        // $categories = [
        //     [
        //         'name' => 'Category 1',
        //         'description' => 'This is category 1'
        //     ],
        //     [
        //         'name' => 'Category 2',
        //         'description' => 'This is category 2'
        //     ],
        //     [
        //         'name' => 'Category 3',
        //         'description' => 'This is category 3'
        //     ],
        // ];

        // $this->db->table('categories')->insertBatch($categories);

        // $products = [];
        // $categoryCount = count($categories);
        // $numberOfProducts = 3; // Number of products to generate
        // $productName = ['Keyboard', 'Mouse', 'Laptop'];
        // $imageName = ['keyboard.jpg', 'laptop.jpg', 'mouse.jpeg'];

        // for ($i = 1; $i <= $numberOfProducts; $i++) {
        //     $categoryIndex = ($i % $categoryCount) + 1;

        //     $products[] = [
        //         'name' => $productName[$i - 1],
        //         'image' => $imageName[$i - 1],
        //         'price' => rand(1000000, 20000000),
        //         'category_id' => $categoryIndex,
        //     ];
        // }

        // $this->db->table('products')->insertBatch($products);
    }
}
