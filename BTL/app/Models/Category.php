<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name', 'description', 'activate'
    ];
    protected $primaryKey = 'id';
    protected $table = 'Category';

    public function book() {
        return $this->hasMany(Book::class);
    }
}
