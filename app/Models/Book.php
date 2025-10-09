<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'publication_year',
        'pages',
        'description',
        'stock',
        'category_id'
    ];

    // Relasi: Buku belongs to kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}