<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'bookID', 'order', 'title', 'content'
    ];
    protected $primaryKey = 'id';
    protected $table = 'Chapter';

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
