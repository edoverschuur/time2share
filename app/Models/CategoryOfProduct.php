<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOfProduct extends Model
{
    protected $table = "category_of_product";

    public function allProducts() {
        return $this->hasMany('\App\Models\Product',"category","category");
    }
}
