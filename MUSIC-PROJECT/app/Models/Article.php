<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // map 2 bang khac ten voi nhau
    protected $table = 'baiviet';
    public $timestamps = false;
    use HasFactory;
}
