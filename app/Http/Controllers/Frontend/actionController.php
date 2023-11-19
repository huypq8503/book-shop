<?php

namespace App\Http\Controllers\Frontend;

use App\Models\likeData;
use App\Models\commentData;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\CommonHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class actionController extends Controller
{
  public function likedTweet(Request $request)
  {
    $like_tweet_id = $request->like;
    $userid = Auth::user()->id;
    $likedata = new likeData;
    $likedata->user_id = $userid;
    $likedata->tweet_id = $like_tweet_id;
    $likedata->save();

    echo `<div class="tmp d-none">
        ` + CommonHelper::LikeCount($like_tweet_id) + `            
   </div>`;
  }
  public function unlikedTweet(Request $request)
  {
    $like_tweet_id = $request->like;
    $userid = Auth::user()->id;
    $res = likeData::where('user_id', $userid)->where('tweet_id', $like_tweet_id)->delete();
    echo `<div class="tmp d-none">
        ` + CommonHelper::LikeCount($like_tweet_id) + `            
   </div>`;
  }

  public function comment(Request $request)
  {
    //this is the tweet id on which comment is done

    $tweeter_id = $request->tweet_cmnt;

    $comment = DB::table('comment')->join('user_details', 'comment.user_id', '=', 'user_details.user_id')
      ->select('comment.comment', 'comment.updated_at', 'comment.user_id', 'user_details.address', 'user_details.username', 'user_details.profile_pic')
      ->where('comment.comment_id', '=', $tweeter_id)
      ->get();

    // $comment = commentData::where('comment_id', $tweeter_id);
    // print_r($comment);


    echo '  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input class="comment-text comment_input" type="text" placeholder="Add Comment.." />
<div class="all-comments">';

    foreach ($comment as $comments) {
      echo  '<div class="contents col-sm-12 d-flex justify-content-between ">
        <div class="col-2 me-2">
            <img src="' . asset('uploads/profile/' .$comments->profile_pic ) . '" class="profile-pic" alt="">
        </div>
        <div class="col-10">
            <div class="d-flex ">
                <div class="col-sm-3"><a
                        href="{{ ' . '/profile/' . $comments->user_id . ') ">' . Str::limit('@' . $comments->username, 5) . '</a>
                </div>
              
                <div class="col-sm-4 me-1"> ' . CommonHelper::times_ago($comments->updated_at) . ' 
                </div>
            </div> 
            <div class="clints-post-text">
              <p>' . $comments->comment . '</p>
            </div>
         </div>
       </div>
      ';
    }

    echo '
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary getcomment" data-tweet=' . $tweeter_id . '>Comment</button>
      </div>';
  }

  public function storeComment(Request $request)
  {
    $comment_id = $request->commentId;
    $comment_text = $request->comment;
    $userid = Auth::user()->id;

    $commentdata = new commentData();

    $commentdata->user_id = $userid;
    $commentdata->comment_id = $comment_id;
    $commentdata->comment = $comment_text;
    $commentdata->save();
    echo `<div class="tmp d-none">
      ` + CommonHelper::commentCount($comment_id) + `            
 </div>`;
  }

  public function getComment()
  {
  }
}
