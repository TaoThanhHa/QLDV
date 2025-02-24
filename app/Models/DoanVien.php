<?php

// app/Models/DoanVien.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoanVien extends Model
{
    use HasFactory;

    protected $table = 'doan_viens';
    protected $fillable = [
        'ho_ten',
        'ngay_sinh',
        'ngay_vao_doan',
        'gioi_tinh',
        'dia_chi',
        'dien_thoai',
        'email',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
