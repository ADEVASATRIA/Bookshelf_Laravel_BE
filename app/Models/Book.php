<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'year',
        'author',
        'summary',
        'publisher',
        'pageCount',
        'readPage',
        'reading',
        'insertedAt'
    ];
}
