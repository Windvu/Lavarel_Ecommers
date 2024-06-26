<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';
    protected $fillable = ['name', 'slug', 'status'];

    use HasFactory;
}
