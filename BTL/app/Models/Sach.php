<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'TenSach', 'TacGia', 'NamXuatBan', 'DanhMucID', 'MoTa', 'HinhAnh', 'KichHoat'
    ];
    protected $primaryKey = 'id';
    protected $table = 'Sach';

    public function danhmuc() {
        return $this->belongsTo('App\Models\DanhMuc', 'DanhMucID', 'id');
    }

    public function chuong() {
        return $this->hasMany('App\Models\Chuong');
    }
}
