<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameBook',
        'price',
        'image',
        'publishDate',
        'authorId',
    ];

    public function getPublishAttribute()
    {
        return date_diff(date_create($this->publishDate), date_create('now'))->y;
    }

    public function author()
    {
        return $this->belongsTo(Author::class,'authorId','id');
    }
}
