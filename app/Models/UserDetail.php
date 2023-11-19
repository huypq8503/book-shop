<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_details';

    protected $fillable=[
        'user_id',
        'phone',
        'pin_code',
        'address',
        'username',
        'profile_pic',
        'background_pic',
        'bio',
        'dob',
        'country',
        'state',
    ];

    public function userMainDetail()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
