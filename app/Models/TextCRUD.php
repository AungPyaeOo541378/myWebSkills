<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextCRUD extends Model
{
    protected $table = 'text_c_r_u_d_s';

    protected $fillable = [
        'title',
        'writer',
        'description',
    ];
}
