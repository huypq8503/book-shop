@extends('layouts.admin')

@section('title', 'User List')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Add Users
                        <a href="{{ url('admin/users') }}" class="btn btn-primary btn-sm float-end"> Back</a>
                    </h4>
                    <div class="card-body">
                        <form action="{{ url('admin/users') }}" method="POST">
                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-md-6 md-3">
                                    <label for=""> Name</label>
                                    <input type="text" name="name" class="form-control" />
                                </div>
                                <div class="col-md-6 md-3">
                                    <label for="">Email </label>
                                    <input type="email" name="email" class="form-control" />
                                </div>
                                <div class="col-md-6 md-3">
                                    <label for="">Password </label>
                                    <input type="password" name="password" class="form-control" />
                                </div>
                                <div class="col-md-6 md-3">
                                    <label for="">Select Role </label>
                                    <select name="role_as" class="form-control" id="">
                                        <option value="">Select Role</option>
                                        <option value="0">User</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-primary mt-3 float-end ">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
