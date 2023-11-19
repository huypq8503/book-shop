@extends('layouts.app')
@section('title', 'My Orders')
@section('content')

    <div class="py-3 py-md-5">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">My Orders </h4>
                    </div>
                </div>
                <div class="col-md-10">
                    @if(session('message'))
                    <p class="alert alert-success">{{session('message')}}</p>
                    @endif
                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <div class="mb-0 text-white">
                                User Detail
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/profile')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Username</label>
                                            <input type="text" name="username" value="{{Auth::user()->name}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Email Addrress </label>
                                            <input type="email" readonly value="{{Auth::user()->email}}" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phone" value="{{Auth::user()->userDetail->phone ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="">Zip/Pin Code</label>
                                            <input type="text" name="pin_code"  value="{{Auth::user()->userDetail->pin_code ?? '' }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div>
                                                  <label for="">Address</label>
                                            </div>
                                          
                                            <textarea name="address" id="" cols="auto" rows="3" class="form-control">
                                           {{Auth::user()->userDetail->address ?? '' }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Save data</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
