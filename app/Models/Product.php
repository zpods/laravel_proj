<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Category;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'images', 'description', 'short_description', 'name', 'price', 'quntity', 'category_id', 'in_stock' ];

    protected $primaryKey = 'product_id';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('product_id', 'quantity');
    }

    public function images()
    {
      return $this->hasMany(Image::class);
    }

    
}


