<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $table = 'personnels';
    protected $primarykey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'users_id',
        'status',
        'office',
        'age',
        'image',
        'number_phone',
        'address'
    ];

    
}
