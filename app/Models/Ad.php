<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $table = 'ads';
    protected $fillable = ['title', 'image', 'mileage', 'price', 'description', 'brand', 'model', 'transmission', 'fuel_type', 'year', 'location', 'phone', 'email', 'condition'];
    protected $primaryKey = 'id';
}
