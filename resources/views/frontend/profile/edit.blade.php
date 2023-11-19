@extends('layouts.apps')
@section('content')
    <form action="{{ url('profile/edit/' . $userDetail->userMainDetail->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- profile inf --}}

        <div class="pb-0 p-3 mb-3  ">
            <div class="row ">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('uploads/profile/' . $userDetail->profile_pic) }}" class="main-profile-pic"
                        alt="">
                </div>

            </div>
            <div class="row justify-content-center  ">
                <div class="btn btn-primary imgEditBtn col-sm-3" data-bs-toggle="modal" data-bs-target="#exampleModal">change photo</div>
            </div>
        </div>
        <div style="font-weight: bold"><input type="text" name="name" class="form-control mb-2"
                value=" {{ Auth::user()->name }}"></li>
        </div>
        <div class="input-group mb-2">
          
            
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Username" name="username"
                value="{{ $userDetail->username }}" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="profile-bio">
            <label for="">Bio</label>
            <textarea name="bio" id="" row="4" class="form-control mb-2">
                                {{ $userDetail->bio }}
                            </textarea>
        </div>

        <br>

        <div class="pb-3 d-flex justify-content-between ">

            <div>
                <label for="">State</label>
                <input value="{{ $userDetail->state }}" name="state" class="form-control" id="">
            </div>
            <div>
                <label for="">Country</label>
                <input value="{{ $userDetail->country }}" name="country" class="form-control" id="">
            </div>
        </div>
        

        <div class="d-flex justify-content-end">
            <div class="m-2">
                <a class="btn btn-danger" href="{{ url('/profile') }}"><i class="  bi bi-arrow-left-circle-fill"></i>
                    Back
                </a>
            </div>
            <div class="m-2">
                <button class="btn btn-primary  " type="submit" role="button">Save</a>
            </div>
        </div>
    </form>

    <!-- Button trigger modal -->
    <!-- Modal -->


    <div class="">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content imgEdit">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="containerImg">
                            <div class="row">
                                <div class="col-lg-6" align="center">
                                    <label onclick="start_cropping()">Browse image</label>
                                    <div id="display_image_div">
                                        <img name="display_image_data" id="display_image_data"
                                            src="{{ asset('uploads/profile/' . $userDetail->profile_pic) }}" alt="Picture"
                                            class="img-fluid">
                                    </div>
                                    <input type="hidden" name="cropped_image_data" id="cropped_image_data">
                                    <br>
                                    <input type="file" name="browse_image" id="browse_image" class="form-control">
                                </div>
                                <div class="col-lg-6" align="center">
                                    <label>Preview</label>
                                    <div id="cropped_image_result">
                                        <img style="width: 350px;" src="dummy-image.png" />
                                    </div>
                                    <br>

                                </div>
                            </div>
                            <!--  end row -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="crop_button">Crop</button>

                        <button type="button" class="btn btn-warning" id="upload_button"
                            onclick="upload()">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('script')
    <script src="{{ asset('/js/photo.js') }}"></script>
@endsection
@endsection
