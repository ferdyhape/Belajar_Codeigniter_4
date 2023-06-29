<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductWithCategory extends Model
{
    function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    public function getProductCategory()
    {
        $result = $this->db->table('products')
            ->join('categories', 'products.category_id = categories.id')
            ->select('products.id, products.name, products.price, categories.name as category_name')
            ->get()
            ->getResultArray();

        return $result;
    }
}
