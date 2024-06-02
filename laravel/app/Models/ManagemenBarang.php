<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagemenBarang extends Model
{
    use HasFactory;
    protected $table = "managemen_barang";
    protected $fillable = ['name', 'quantity','price'];
}
