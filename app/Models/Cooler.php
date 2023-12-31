<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooler extends Model
{
    use HasFactory;

    protected $table = 'coolers';

    protected $fillable = [
        'name', 
        'specifications', 
        'price'
    ];

}
