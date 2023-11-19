<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\FollowHelper;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class searchController extends Controller
{
    public function index()
    {
        return view('frontend.search.index');
    }

    public function searchUser(Request $request)
    {
        

        $query = $request->search;
        // $filterResult = User::where('name', 'LIKE', '%' . $query . '%')->get();
        $filterResult = DB::table('users')->join('user_details', 'users.id', '=', 'user_details.user_id')->where('users.name', 'LIKE', '%' . $query . '%')
            ->select('users.id', 'users.name', 'user_details.username', 'user_details.bio', 'user_details.profile_pic')
            ->get();
        $output = "";
        if (isset($filterResult)) {
            foreach ($filterResult as $filterResult) {
                $output .= '
        <div class="card mt-3" href="' . url("/profile/" . $filterResult->id) . '">
                    <div class=" card-body d-flex ">
                        <div class="col-2">
                            <img src="' . asset('uploads/profile/' . $filterResult->profile_pic) . ' " class="profile-pic" alt="">
                        </div>
                        <div class="dfjcspaic-- col-10">
                            <div class="col-9">
                                <span class="mt-2">' .  $filterResult->name . '</span>
                                <span>' .  $filterResult->username . ' </span>
                                <p class="text-truncate col-8">
                                <span>' .  $filterResult->bio . ' </span>
                                </p>
                            </div>
                            <div class="col-3 dfjcsb-- m-2">
                                <button class="button-13" ><a  href="' . url("/profile/" . $filterResult->id) . '">See Profile</a> </button>
                            </div>
                       </div>
                   </div>
                   </div>
        ';
            }
        } else {
            $output .= '<div>
        <h1>No result found</h1>
        </div>
        .';
        }
        return Response($output);
    }

    public function searchUserw(Request $request)
    {
        $query = $request->search;
        $filterResult = User::where('name', 'LIKE', '%' . $query . '%')->get();
        $output = ($filterResult);
        return Response($output);
    }
}
