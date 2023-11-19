<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likeData extends Model
{
    use HasFactory;
    
    protected $table = 'like_data';

    protected $fillable = [
        'user_id',
        'tweet_id',
    ];

}
