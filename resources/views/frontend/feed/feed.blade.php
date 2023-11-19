<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/feed.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    @yield('css')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 ">
        {{-- @include('layouts.navigation') --}}
        <main>
            <div class="row  justify-content-center">

                <div class="col-md-10  col-lg-8 ">
                    <div class="container d-flex ">
                        <div class="col-8">
                            @if (\Session::has('message'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! \Session::get('message') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            {{-- sidenavbar --}}
                            @include('layouts.include.navbar')
                            <div class="clint-btn">
                                <span><a href="/makeclint">+</a></span>
                            </div>
                            <hr>
                            @foreach ($post as $item)
                                <div class="d-flex justify-content-between mt-3 tweet-div">

                                    {{-- {{dd($item)}} --}}
                                    {{-- {{dd($item->tweetUserDetail->username)}} --}}

                                    <div class="contents col-sm-12 d-flex justify-content-between">
                                        <div class="col-2 me-2">
                                            <a href="{{ url('/profile/' . $item->tweetUserDetail->userDetail->user_id) }}">
                                            <img src="{{ asset('uploads/profile/' . $item->tweetUserDetail->userDetail->profile_pic) }}" class="profile-pic"
                                                alt=""></a>
                                        </div>
                                        <div class="col-10">
                                            <div class="d-flex ">
                                                <div class="col-sm-3 me-1"><a
                                                        href="{{ url('/profile/' . $item->user_id) }}">{{ $item->tweetUserDetail->name }}</a>
                                                </div>
                                                <div class="col-sm-2 me-1">
                                                    {{ Str::limit('@' . $item->tweetUserDetail->userDetail->username, 5) }}
                                                    </p>
                                                </div>
                                                <div class="col-sm-2 me-1">
                                                    {{ CommonHelper::times_ago($item->updated_at) }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="clint-post-image">
                                                    <div class="clints-post-text">
                                                        <p>{{ $item->clint }}</p>
                                                    </div>
                                                    @if ($item->image)
                                                        <img src="{{ asset('uploads/tweetsImg/' . $item->image) }}"class="img-fluid clint-post-image-main"
                                                            alt="" srcset="">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="d-flex col-xm-12 justify-content-left mt-3">
                                                <div> <span
                                                        class="action-pic {{ CommonHelper::userLiked(Auth::user()->id, $item->id) ? 'unlike-btn' : 'like-btn' }} "
                                                        alt="" id="like-btn" data-tweet={{ $item->id }}>
                                                        <i class="bi bi-heart">
                                                        </i>
                                                        <div class="mt-counter likes-count d-inline-block">
                                                            <p class="tweet_like_count">
                                                                {{ CommonHelper::LikeCount($item->id) }}</p>
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="ms-5"> <span class="action-pic comment" alt=""
                                                        id="comment-btn" data-tweet={{ $item->id }}
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                            class="bi bi-chat"></i>
                                                        <div class="mt-counter likes-count d-inline-block">
                                                            <p class="tweet_comment_count">
                                                                {{ CommonHelper::commentCount($item->id) }}</p>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <hr>
                            <div class="">
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content popUpComment">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 whotofollow" id="whotofollow">
                            @foreach ($whotofollowdata as $item)
                                <div class="d-flex justify-content-between">
                                    <div class="col-2 me-2">
                                        <a href="{{ url('/profile/' .  $item->user_id) }}">
                                        <img src="{{ asset('uploads/profile/' . $item->profile_pic) }}" class="profile-pic"
                                            alt=""></a>
                                    </div>
                                    <div class="col-2 me-2">
                                        {{ $item->name }}
                                    </div>
                                    <button class=" follow-btn  <?= $isUserFollow ? 'following' : 'follow' ?>"
                                        role="button" data-follow={{ $item->id }}
                                        data-userid={{ Auth::user()->id }}>
                                        @if ($isUserFollow)
                                            Following
                                        @else
                                            Follow
                                        @endif
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="main-btns col-md-8 col-sm-12 col-lg-6">
                    <div class=" d-flex justify-content-center">
                        <div class="bottom-options me-3 ms-2 "><a href="/feed"><i class="bi bi-house"></a></i></div>
                        <div class="bottom-options me-5 ms-5 "><a href="/"><i class="bi bi-arrow-left-square"></a></i>
                        </div>
                        <div class="bottom-options me-3 ms-3"><a href="/search/user"><i class="bi bi-search"></a></i></div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    {{-- <script type="text/javascript">
var route = "{{ url('search-user') }}";
$('#search').typeahead({
source: function (query, process) {
return $.get(route, {
    query: query
}, function (data) {
    return process(data);
});
}
});
</script> --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{ asset('/js/like.js') }}"></script>
    <script src="{{ asset('/js/comment.js') }}"></script>
    <script src="{{ asset('/js/follow.js') }}"></script>
</body>

</html>
