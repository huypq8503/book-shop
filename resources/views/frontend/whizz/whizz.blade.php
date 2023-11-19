@extends('layouts.apps')
@section('content')

    <form action="{{ url('/makeclint/' . Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="inner">
            <div class="d-flex m-2">
                <div class="col-sm-2">
                    <img src="{{ asset('uploads/profile/' . $userDetail->profile_pic) }}" class="profile-pic" alt="">
                </div>
                <div class="col-sm-10 main-tweet-container">
                    <label for="" class="w-100">
                        <textarea type="text" rows="2" class="form-control  text-whathappen" placeholder="What you doin?"
                            name="makeclint" id=""></textarea>
                    </label>

                    <div class="position-relative upload-photo">
                        <img class="img-upload-tmp" src="assets/images/tweets/tweet-60666d6b426a1.jpg" alt="">
                        <div class="icon-bg">
                            <i id="#upload-delete-tmp" class="bi bi-x position-absolute upload-delete"></i>
                        </div>
                    </div>
                    <div class=" bottom ">
                        <div class="bottom-container">
                            <label for="tweet_img" class="ml-3 mb-2 uni">
                                <i class="bi bi-card-image image-upload-icon"></i>
                            </label>
                            <input class="tweet_img " id="tweet_img" type="file" name="tweet_img">
                        </div>
                        <div class="hash-box">
                            <ul style="margin-bottom: 0;">
                            </ul>
                        </div>
                        <div>
                            <span class="bioCount" id="count">140</span>
                            <input type="submit" value="Post" name="tweet" class="submit">
                        </div>
                    </div>
                </div>

            </div>
        </div>




    </form>
@section('script')
    <script src="{{ asset('/js/photo.js') }}"></script>
    <script src="{{ asset('/js/hashtag.js') }}"></script>
@endsection
@endsection
