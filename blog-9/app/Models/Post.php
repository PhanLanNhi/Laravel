<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // goi de lien ket 2 bang
    protected $table = 'blog_entries';
    use HasFactory;
}
