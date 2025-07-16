<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'whatsapp',
        'email',
        'nominal',
        'doa',
        'payment_method',
        'program_type',
        'kode_unik',
        'total_donasi',
        'status',
    ];

}

