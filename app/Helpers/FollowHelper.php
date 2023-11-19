<?php
namespace App\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FollowHelper extends Controller{
    public static function  isUserFollow($user_id,$profile_id){
        $count=DB::table('follower_data')->where('follower_id','=',$user_id)->where('following_id','=',$profile_id)->count();
        if($count>0)
        {
            return true;
        }
        else{

            return false;
        }
    }

    public static function countFollowers($user_id){
        $countFollowers=DB::table('follower_data')->where('following_id','=',$user_id)->count();
        return $countFollowers;
    }
    public static function countFollowing($user_id){
        $countFollowing=DB::table('follower_data')->where('follower_id','=',$user_id)->count();
        return $countFollowing;
    }

    public static function time_ago($timeStamp){
        
    }
}
?>