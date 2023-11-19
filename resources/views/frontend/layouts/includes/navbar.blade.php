<div class="d-flex justify-content-between pt-3">
    <div class="col-sm-4 ">
        <div class=" "><a href="{{ url('/profile/' . Auth::user()->id) }}">
            <img type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                aria-controls="offcanvasWithBothOptions" src="{{ asset('uploads/profile/' . $userDetail->profile_pic) }}" class="profile-pic"
                alt=""></a>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
                aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    {{-- inside the sidebar --}}
                    <div class="container-fluid">
                        <div class="d-flex justify-content-between">
                            <div class="col-sm-9">
                                <div><a href={{ url('/profile/' . Auth::user()->id) }}><img
                                            src="{{ asset('uploads/profile/' . $userDetail->profile_pic) }}" class="profile-pic" alt=""></a>

                                </div>
                                <div>
                                    <span style="font-weight: bold">Aman chaudhary</span>
                                    <span>@amanChaudhary</span>
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
                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit(); ">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>

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
            <img src="{{ asset('images/logo.png') }}" class="logo-pic" alt="">
        </div>
    </div>
    <div class="col-sm-4 align-self-center text-end ">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
            <path
                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
        </svg>
    </div>

</div>
