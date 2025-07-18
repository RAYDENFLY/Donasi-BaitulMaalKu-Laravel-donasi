<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrisPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_type',
        'image_path',
    ];
}