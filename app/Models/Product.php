<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Ye fields mass assignable hain
    protected $fillable = ['name', 'sku', 'price', 'status', 'image'];
}