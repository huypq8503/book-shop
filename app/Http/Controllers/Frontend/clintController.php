<?php

namespace App\Http\Controllers\Frontend;

use App\Models\allClint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\userDetail;
class clintController extends Controller
{
    public function index()
    {
        $userDetail = userDetail::where('user_id', Auth::user()->id)->first();
        return view('Frontend.whizz.whizz',compact('userDetail'));
    }
    public function store(Request $request)
    {
        // dd($request);
        if ($request->hasFile('tweet_img')) {
            $uploadPathProfile = 'uploads/tweetsImg/';
            $file = $request->file('tweet_img');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move($uploadPathProfile, $filename);
            $finalPathProfile = $uploadPathProfile . $filename;
// dd($filename);
            $addClint = allClint::create(
                [
                    'user_id' => Auth::user()->id,
                    'clint' => $request->makeclint,
                    'image' => $filename
                ]
            );
            // dd($addClint);
        } else {
            $addClint = allClint::create(
                [
                    'user_id' => Auth::user()->id,
                    'clint' => $request->makeclint,
                    'image' => null
                ]
            );
        }

        return redirect('/feed')->with('message','clint added');
    }
}
