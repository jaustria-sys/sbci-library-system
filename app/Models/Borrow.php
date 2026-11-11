<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Borrow extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'borrows';

    protected $fillable = [
        'book_id',
        'book_title',
        'user_id',
        'user_name',
        'user_email',
        'status',
        'borrowed_at',
        'return_date'
    ];
}
