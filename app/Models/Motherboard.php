<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    use HasFactory;

    protected $table = 'motherboards';

    protected $fillable = [
        'name', 
        'socket_cpu', 
        'memory_max', 
        'memory_slots', 
        'color', 
        'price', 
        'compatible_cpu_gen', 
        'compatible_ram_type'
    ];

    
}
