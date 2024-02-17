<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $primaryKey = 'borrowingID';
    protected $guarded = ['created_at', 'updated_at'];
    public function book()
    {
        return $this->belongsTo(Book::class, 'bookID', 'bookID');
    }
}
