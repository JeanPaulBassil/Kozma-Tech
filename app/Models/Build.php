<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;

    protected $table = 'pc_builds';

    protected $fillable = [
        'user_id',
        'motherboard_id',
        'cpu_id',
        'ram_id',
        'psu_id',
        'gpu_id',
        'storage_id',
        'cooler_id',
        'case_id',
        'total_price'
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function motherboard()
    {
        return $this->belongsTo(Motherboard::class);
    }

    public function cpu()
    {
        return $this->belongsTo(Cpu::class);
    }

    public function ram()
    {
        return $this->belongsTo(Ram::class);
    }

    public function powerSupply()
    {
        return $this->belongsTo(PowerSupply::class, 'psu_id');
    }

    public function gpu()
    {
        return $this->belongsTo(Gpu::class);
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    public function cooler()
    {
        return $this->belongsTo(Cooler::class);
    }

    public function caseModel()
    {
        return $this->belongsTo(PcCase::class, 'case_id');
    }

}
