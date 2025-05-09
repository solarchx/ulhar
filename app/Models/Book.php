<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'year', 'publisher_id'];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
