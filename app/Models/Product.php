<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primarykey = 'id';

    public $timestamps = true;

    protected $fillble = [
        'name_pd',
        'quantity_pd',
        'sold_pd',
        'image_pd',
        'price_pd',
        'describe_pd',
    ];
}
