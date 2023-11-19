<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class followData extends Model
{
    use HasFactory;
    protected $table = 'follower_data';

    protected $fillable= [
       'follower_id',
       'following_id'
    ];
}
