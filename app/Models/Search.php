<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'search';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'category',
        'price',
    ];
}
