<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameAuthor',
        'birthDay',
        'gender',
    ];

    public function getAgeAttribute()
    {
        return date_diff(date_create($this->birthDay), date_create('now'))->y;
        /* Lấy thời gian hiện tại trừ đi thời gian trong database  */
        /* date_diff: Là để trừ dữ liệu kiểu DateTime() hoặc Date() */
        /* date_create: Là hàm ép kiểu biến trở thành kiểu DateTime() trong PHP. 
        Nếu không có tham số gì thì nó sẽ trả về thời gian hiện tại */
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }


}
