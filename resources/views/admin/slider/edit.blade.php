@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Add slider
                        <a href="{{ url('admin/slider') }}" class="btn btn-primary btn-sm float-end"> Back</a>
                    </h4>
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('admin/slider/' . $sliders->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" value="{{ $sliders->title }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" value="" class="form-control">{{ $sliders->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Image</label>
                     
                                    <input type="file" name="image" class="form-control">
                                
                                <span class="mb-3 mt-3 ">
                                    <img src="{{ asset($sliders->image) }}" alt=""
                                        style="height: auto; width:250px">
                                </span>
                            </div>

                            <div class="mb-3">
                                <label for="">Status</label><br />
                                <input type="checkbox" name="status" {{ $sliders->status == '1' ? 'checked' : '' }}
                                    style=" height:40px; width:40px" /> Checked=Hidden,Unchecked=Visible
                            </div>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
