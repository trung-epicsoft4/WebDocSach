<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory, Notifiable;

    public $timestamps = false;
    protected $fillable = [
        'name', 'activate'
    ];
    protected $primaryKey = 'id';
    protected $table = 'Category';

    public function books() {
        return $this->hasMany(Book::class, 'categoryID');
    }
}
