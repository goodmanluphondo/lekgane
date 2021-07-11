<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'size',
        'sku',
        'barcode',
        'quantity',
        'cost',
        'price',
        'markup'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
