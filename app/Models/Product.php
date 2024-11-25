<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   // protected $table = "products";// <-- El nombre personalizado
    use HasFactory;
    protected $fillable = [
        'category_id',
        'description',
        'detail',
    ];
}
