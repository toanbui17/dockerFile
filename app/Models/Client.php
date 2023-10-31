<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $primarykey = 'id';

    public $timeStamps = true;
    
    protected $fillable = [
        'name',
        'email',
        'name_product',
        'sold_product',
        'image',
        'number_phone',
        'address',
    ];
}
