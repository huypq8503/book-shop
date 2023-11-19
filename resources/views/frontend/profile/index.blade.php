@extends('layouts.apps')
@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
<div class="wrapper ">
    <div class="row justify-center ">
        <div class="col ">
            {{-- profile info --}}

            <div class="pt-3 mb-3 ps-3 pe-3 ">
                <div class="d-flex justify-content-center mb-3">
                    <div> <img src="{{ asset('uploads/profile/' . $userDetail->profile_pic) }}" class="main-profile-pic"
                            alt=""></div>

                </div>
                <div class="d-flex justify-content-center mb-3">

                    <div class="align-self-center">
                        {{-- {{dd(Auth::user()->id )}} --}}
                        <!-- HTML !-->
                        @if ($userDetail->userMainDetail->id != Auth::user()->id)
                            <button class=" follow-btn  <?= $isUserFollow ? 'following' : 'follow' ?>" role="button"
                                data-follow={{ $userDetail->userMainDetail->id }} data-userid={{ Auth::user()->id }}>
                                @if ($isUserFollow)
                                    Following
                                @else
                                    Follow
                                @endif

                            </button>
                        @else
                            <!-- Button trigger modal -->
                            <button type="button" class="button-13">
                                <a href="/profile/edit/{{ Auth::user()->id }}">Edit Profile</a>
                            </button>
                        @endif

                    </div>
                </div>
                <hr>
                <div>
                    <ul>
                        <li style="font-weight: bold">{{ $userDetail->userMainDetail->name }}</li>
                        <li>@ {{ $userDetail->username }}</li>
                    </ul>
                </div>
                <div class="profile-bio">
                    {{ $userDetail->bio }}
                </div>
                <br>
                <div class="pb-3">
                    <span class="pe-3"><i class="bi bi-geo-alt"></i> {{ $userDetail->state }},
                        {{ $userDetail->country }}
                    </span>
                    <span><i class="bi bi-calendar"></i> Joined:
                        {{ \Carbon\Carbon::parse($userDetail->created_at)->format('F y') }}</span>
                </div>
                <div><span class="count-following">{{ $countFollowing }}</span>
                    Following
                    <span class="count-follower ps-3">{{ $countFollowers }}</span> Followers
                </div>
            </div>

            {{-- clint options --}}
            <hr>

            @foreach ($post as $item)
                <div class="d-flex justify-content-between">

                    {{-- {{dd($item->tweetUserDetail->userDetail->username)}} --}}

                    <div class="contents col-sm-12 d-flex justify-content-between tweet-div mb-5 ">
                        <div class="col-2 me-2">
                            <img src="{{ asset('uploads/profile/' . $item->tweetUserDetail->userDetail->profile_pic) }}"
                                class="profile-pic" alt="">
                        </div>
                        <div class="col-9">
                            <div class="d-flex ">
                                <div class="col-sm-4 me-1"><a
                                        href="{{ url('/profile/' . $item->user_id) }}">{{ $item->tweetUserDetail->name }}</a>
                                </div>
                                <div class="col-sm-4 me-1">
                                    {{ Str::limit('@' . $item->tweetUserDetail->userDetail->username, 5) }}
                                    </p>
                                </div>
                                <div class="col-sm-4 me-1"> {{ CommonHelper::times_ago($item->updated_at) }}</div>
                            </div>
                            <div>
                                <div class="clints-post-text">

                                    <p>{{ $item->clint }}</p>
                                </div>
                                <div class="clint-post-image">
                                    <img src="{{ asset('uploads/tweetsImg/' . $item->image) }}"
                                        class="img-fluid clint-post-image-main" alt="" srcset="">
                                </div>

                            </div>
                            <div class="d-flex col-xm-9 justify-content-left">
                                <div> <span
                                        class="action-pic {{ CommonHelper::userLiked(Auth::user()->id, $item->id) ? 'unlike-btn' : 'like-btn' }} "
                                        alt="" id="like-btn" data-tweet={{ $item->id }}>
                                        <i class="bi bi-heart">
                                        </i>
                                        <div class="mt-counter likes-count d-inline-block">
                                            <p class="tweet_like_count">{{ CommonHelper::LikeCount($item->id) }}</p>
                                        </div>
                                    </span>
                                </div>
                                <div class="ms-5"> <span class="action-pic comment" alt="" id="comment-btn"
                                        data-tweet={{ $item->id }} data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="bi bi-chat"></i></span></div>

                                {{-- <div> <span class="action-pic" alt="" id="retweet-btn"><i
                                            class="bi bi-arrow-repeat"></i></span></div>
                                <div> <span class="action-pic" alt="" id="share-btn"><i
                                            class="bi bi-share"></i></span></div> --}}

                            </div>
                        </div>
                    </div>



                </div>
            @endforeach
        </div>
        <div class="">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content popUpComment">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script src="{{ asset('/js/photo.js') }}"></script>
    <script src="{{ asset('/js/like.js') }}"></script>
    <script src="{{ asset('/js/follow.js') }}"></script>
    <script src="{{ asset('/js/comment.js') }}"></script>
@endsection
@endsection
