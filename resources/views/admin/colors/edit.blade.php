@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Edit Colors
                        <a href="{{ url('admin/colors/') }}" class="btn btn-primary btn-sm float-end"> Back</a>
                    </h4>
                    <div class="card-body">
                        <form action="{{url('admin/colors/'.$color->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Color Name</label>
                                <input type="text" name="name" class="form-control" value="{{$color->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="">Color Code</label>
                                <input type="text" name="code" class="form-control" value="{{$color->code}}">
                            </div>
                            
                            <div class="mb-3">
                                <label for="">Status</label><br/>
                                <input type="checkbox" name="status" {{$color->code ?'checked':' '}} style=" height:40px; width:40px"/> Checked=Hidden,Unchecked=Visible
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
