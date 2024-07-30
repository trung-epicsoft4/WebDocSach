<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'TenSach', 'MoTa', 'KichHoat', 'HinhAnh', 'NoiDung', 'DanhMucID'
    ];
    protected $primaryKey = 'id';
    protected $table = 'Sach';

    public function danhmuc() {
        return $this->belongsTo('App\Models\DanhMuc', 'DanhMucID', 'id');
    }
}
