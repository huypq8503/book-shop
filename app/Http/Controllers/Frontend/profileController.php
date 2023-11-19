<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\allClint;
use App\Models\followData;
use App\Models\userDetail;
use Illuminate\Http\Request;
use App\Helpers\FollowHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;

class profileController extends Controller
{
    public function index(Request $request, $userid)
    {
        // dd($userid);

        $userDetail = userDetail::where('user_id',  $userid)->first();
        $isUserFollow = FollowHelper::isUserFollow(Auth::user()->id, $userid);
        $countFollowers = FollowHelper::countFollowers($userid);
        $countFollowing = FollowHelper::countFollowing($userid);
        $user_id = Auth::user()->id;
        if ($userid != $user_id) {
            $post = allClint::where('user_id', $userid)->get();
        } else {
            $post = allClint::where('user_id', $user_id)->get();
        }


        return view('Frontend.profile.index', compact('userDetail', 'isUserFollow', 'countFollowers', 'countFollowing', 'post'));
    }
    public function edit(Request $request, $userid)
    {
        // dd($request);
        $userDetail = userDetail::where('user_id', $userid)->first();
        return view('Frontend.profile.edit', compact('userDetail'));
    }

    public function update(Request $request, $userid)
    {
        $usermain = User::findOrFail($userid);
        $usermain->name = $request->name;
        $user = UserDetail::where('user_id', '=',Auth::user()->id)->first();

        $profile_pic =  $user->profile_pic;
        $background_pic =  $user->background_pic;

        $finalPathProfile = "";
        $finalPathBackground = "";
        $uploadPathProfile = 'uploads/profile/';
        // if ($request->hasFile('profileImage')) {
        //     $file = $request->file('profileImage');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $ext;
        //     $file->move($uploadPathProfile, $filename);
        //     $finalPathProfile = $uploadPathProfile . $filename;
        // }
        // // $manager = new ImageManager(['driver' => 'gd']);
        // $uploadPathBackground = 'uploads/background/';
        // if ($request->hasFile('backgroundImage')) {
        //     $file = $request->file('backgroundImage');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $ext;
        //     // $image=$manager->make($file->getRealPath())->crop(1500, 500)->save($uploadPathBackground.$filename,80);
        //     // dd($image);
        //     $file->move($uploadPathBackground, $filename);
        //     $finalPathBackground = $uploadPathBackground . $filename;
        // }
        if ($finalPathProfile) {
            $user->profile_pic = $finalPathProfile;
        } else {
            $user->profile_pic = $profile_pic;
        }

        if ($finalPathBackground) {
            $user->background_pic = $finalPathBackground;
        } else {
            $user->background_pic = $background_pic;
        }

        $user->username = $request->username;
        $user->bio = $request->bio;
        $user->country = $request->country;
        $user->state = $request->state;

        $usermain->save();
        $user->save();

        return redirect('/profile/' . $userid);
    }
    public function followDatafollow(Request $request)
    {
        $following_id = $request->follow;
        $follower_id = Auth::user()->id;
        $followdata = new followData;
        $followdata->following_id = $following_id;
        $followdata->follower_id = $follower_id;
        $followdata->save();
    }
    public function followDataUnfollow(Request $request)
    {
        $following_id = $request->unfollow;
        $follower_id = Auth::user()->id;
        $followdata =  followData::where('following_id', '=', $following_id)->where('follower_id', '=', $follower_id)->delete();
    }
    public function photo(Request $request)
    {
        $userid = Auth::user()->id;
        $user = UserDetail::where('user_id', '=',Auth::user()->id)->first();

        $uploadPathProfile = 'uploads/profile/';
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $filename=uniqid() . '.png';
        $file = $uploadPathProfile.$filename;
        file_put_contents($file, $image_base64);

        $response = array(
            'status' => true,
            'msg' => 'Image uploaded on server successfully!',
            'file' => $file,
            'userid' => $user
        );
        echo json_encode($response);
        $user->profile_pic = $filename;
        $user->save();
    }
}
