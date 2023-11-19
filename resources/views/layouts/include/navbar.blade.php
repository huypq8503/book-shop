<div class="d-flex justify-content-between pt-3">
    <div class="col-sm-4 ">
        <div class=" ">
            <a href="{{ url('/profile/' . Auth::user()->id) }}">
            <img type="button" 
            {{-- data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" --}}
                aria-controls="offcanvasWithBothOptions" src="{{ asset('uploads/profile/' . $userDetail->profile_pic) }}" class="profile-pic"
                alt=""></a>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
                aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    {{-- inside the sidebar --}}
                    <div class="container-fluid">
                        <div class="d-flex justify-content-between">
                            <div class="col-sm-9">
                                <div>
                                    <a href={{ url('/profile/' . Auth::user()->id) }}><img
                                            src="{{ asset('uploads/profile/' . $userDetail->profile_pic) }}" class="profile-pic" alt="">
                                    </a>
                                </div>

                                <div>
                                    <span style="font-weight: bold">{{$userDetail->userMainDetail->name}}</span>
                                    <br>
                                    <span>@ {{$userDetail->username}}</span>
                                </div>

                                <div class="d-flex">
                                    <p><span style="font-weight: bold">400</span> followers</p>
                                    &nbsp;
                                    <p><span style="font-weight: bold">1500</span> following</p>
                                </div>
                            </div>
                            <div class="col-sm-3  pt-3">
                                <button type="button" class="btn btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-body">
                    <div class="container">
                        <div
                            class="d-flex justify-content-between align-items-center   bg-body-secondary sidebar-option">

                            <div class="col-sm-3">
                                <img src="{{ asset('images/account.png') }}" class="sidebar-icons" alt="">
                            </div>
                            <div class="col-sm-8 w-75 sidebar-text">
                                Profile
                            </div>
                        </div>
                        <div
                            class="d-flex justify-content-between align-items-center mt-2  bg-body-secondary sidebar-option">
                            <div class="col-sm-3">
                                <img src="{{ asset('images/account.png') }}" class="sidebar-icons" alt="">
                            </div>
                            <div class="col-sm-8  w-75 sidebar-text">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 align-self-center text-center">
        <div class="app-logo">
            <img src="{{ asset('images/logomain.png') }}" class="logo-pic" alt="">
        </div>
    </div>
    <div class="col-sm-4 align-self-center text-end ">
       
    </div>
</div>
