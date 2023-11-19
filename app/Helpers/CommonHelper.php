<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CommonHelper extends Controller
{

    public static function times_ago($time)
    {
        $seconds = Carbon::now()->diffInSeconds($time);
        $minutes = round($seconds / 60); // value 60 is seconds  
        $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
        $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
        $weeks   = round($seconds / 604800); // 7*24*60*60;  
        $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
        $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

        if ($seconds <= 60) {

            return "just now";
        } else if ($minutes <= 60) {

            if ($minutes == 1) {

                return "one minute ago";
            } else {

                return "$minutes minutes ago";
            }
        } else if ($hours <= 24) {

            if ($hours == 1) {

                return "an hour ago";
            } else {

                return "$hours hrs ago";
            }
        } else if ($days <= 7) {

            if ($days == 1) {

                return "yesterday";
            } else {

                return "$days days ago";
            }
        } else if ($weeks <= 4.3) {

            if ($weeks == 1) {

                return "a week ago";
            } else {

                return "$weeks weeks ago";
            }
        } else if ($months <= 12) {

            if ($months == 1) {

                return "a month ago";
            } else {

                return "$months months ago";
            }
        } else {

            if ($years == 1) {

                return "one year ago";
            } else {

                return "$years years ago";
            }
        }
    }
    public static function userLiked($user_id, $tweet_id)
    {
        $isliked = DB::table('like_data')
            ->select('user_id', 'tweet_id')
            ->where('user_id', '=', $user_id)
            ->where('tweet_id', '=', $tweet_id)
            ->count();
        if ($isliked) {
            return true;
        } else {
            return false;
        }
    }
    public static function LikeCount($tweet_id)
    {
        $likecount = DB::table('like_data')
            ->select('tweet_id')
            ->where('tweet_id', '=', $tweet_id)
            ->count();
        return $likecount;
    }
    public static function commentCount($tweet_id)
    {
        $likecount = DB::table('comment')
            ->select('comment_id')
            ->where('comment_id', '=', $tweet_id)
            ->count();
        return $likecount;
    }

    
}
