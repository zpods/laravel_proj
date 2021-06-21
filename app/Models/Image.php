<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['image_id', 'displayed', 'description', 'src', 'product_id'];

    protected $primaryKey = 'image_id';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
