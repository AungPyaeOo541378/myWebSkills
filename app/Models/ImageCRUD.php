<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageCRUD extends Model
{
    protected $table = 'image_c_r_u_d_s';

    protected $fillable = [
        'category_id',
        'product_name',
        'image',
        'price',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
