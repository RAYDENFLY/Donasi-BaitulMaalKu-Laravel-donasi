<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program'; // tanpa "s"
    protected $guarded = []; // atau tentukan field yang bisa diisi

public function donations()
    {
        return $this->hasMany(Donation::class, 'program_type', 'slug'); 
        // Ganti 'slug' sesuai dengan kolom yang cocok di tabel program
    }

}
