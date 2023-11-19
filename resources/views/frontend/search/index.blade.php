@extends('layouts.apps')
@section('content')
    <div class="container">
        {{-- Search Box --}}
        <div class="row mt-3 justify-content-around">
            <div class="col-sm-8">
                <div class="input-group mb-3 ">
                    <input type="text" class="form-control select-search" placeholder="Name......."
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
        <div class="result-data">
            <div>
            </div>
        </div>
        <div class="col-md-8">
            <p>
            <h1>
           
            </h1>
            </p>
        </div>
        {{-- @if (isset($filterResult))
        {{dd($filterResult)}}
        @foreach ($filterResult as $result)

            <a class="card mt-3" href="{{url('/profile/'.$filterResult->id)}}">
                <div class=" card-body d-flex ">
                    <div class="col-2">
                        <img src="{{ asset('images/AliAbdaal.jpg') }}" class="profile-pic" alt="">
                    </div>
                    <div class="dfjcspaic-- col-10">
                        <div class="col-9">
                            <span>{{ $filterResult->name }}</span>
                            <span>{{ $filterResult->userDetail->username }}</span>
                            <p class="text-truncate col-8">
                                Engineer, plays cricket alot | Actions speaks louder|Prespective
                            </p>
                        </div>
                        <div class="col-3 dfjcsb-- m-2">
                            <button class="button-13">Follow</button>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
        @endif  --}}
    </div>
@section('script')
    <script src="{{ asset('/js/ajax/search.js') }}"></script>
@endsection
@endsection
