<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'price', 'category_id', 'image'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    // GET ALL PRODUCT WITH CATEGORY
    public function getAllProductWithCategory()
    {
        $result = $this->db->table('products')
            ->join('categories', 'products.category_id = categories.id')
            ->select('products.id, products.name, products.price, categories.name as category_name')
            ->get()
            ->getResultArray();

        return $result;
    }

    function productWithCategory($id)
    {
        $result = $this->db->table('products')
            ->join('categories', 'products.category_id = categories.id')
            ->select('products.id, products.image, products.name, products.price, categories.name as category_name')
            ->where('products.id', $id)
            ->get()
            ->getResultArray();

        return $result;
    }
    // RELATIONSHIP
    public function category()
    {
        return $this->belongsTo(CategoryModel::class);
    }
}
