<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class allClint extends Model
{
    use HasFactory;

    protected $table = 'all_clint';

    protected $fillable= [
        'user_id',
        'clint',
        'image'
    ];

    public function tweetUserDetail(){

        return $this->belongsTo(User::class,'user_id','id');
    }
}
