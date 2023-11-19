@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Sliders
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm float-end"> Add slider</a>
                    </h4>
                    <div class="card-body">
                        <table class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $slider)
                                    <tr><td>{{$slider->id}}</td>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->description}}</td>
                                        <td>
                                            <img src="{{asset("$slider->image")}}" alt=""  style="width:auto ; height:40px ; border-radius:0">
                                        </td>
                                        <td>{{$slider->status=='0'?'visible':'hidden'}}</td>
                                        <td>
                                            <a href="{{url('admin/slider/'.$slider->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                            <a href="{{url('admin/slider/'.$slider->id.'/delete')}}"  class="btn btn-danger"> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
