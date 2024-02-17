<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    // $fillable cho phép bạn xác định các trường
    //  mà bạn muốn cho phép gán giá trị trực tiếp trong model,
    //  đồng thời đảm bảo tính toàn vẹn dữ liệu và bảo vệ các trường quan trọng khỏi việc gán giá trị không mong muốn.

    // $guarded: không được phép gán (assign) trực tiếp,
    // không được tự động gán dữ liệu 
    // sử dụng các phương thức khác để gán giá trị cho các trường này

    protected $primaryKey = 'bookID';
    protected $guarded = ['created_at', 'updated_at'];
    
    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
