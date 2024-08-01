<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuong extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'SachID', 'SoChuong', 'TieuDe', 'NoiDung'
    ];
    protected $primaryKey = 'id';
    protected $table = 'Chuong';

    public function sach() {
        return $this->belongsTo('App\Models\Sach', 'SachID', 'id');
    }
}
