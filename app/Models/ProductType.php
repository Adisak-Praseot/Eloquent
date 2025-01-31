<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductType extends Model
{
    use HasFactory;
    protected $fillable = ['name']; // กำหนดให้ name สามารถเพิ่มข้อมูลได้ผ่าน mass assignment
    public function products() // ความสัมพันธ์ One-to-Many กับ Product
    {
        return $this->hasMany(Product::class, 'product_type');
     }
}
