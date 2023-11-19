<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentData extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $fillable= [
        'user_id',
        'comment_id',
        'comment'
    ];

}
