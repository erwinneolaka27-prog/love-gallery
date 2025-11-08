<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
    'title',
    'description',
    'image',
    'date',
];

}
