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
                    <h4>Users
                        <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm float-end"> Add Users</a>
                    </h4>
                    <div class="card-body">
                        {{-- {{dd('h')}} --}}
                        <table class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                          
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                         <td>
                                            @if($user->role_as=='1')
                                                <label class="badge btn-primary" for="" >Admin</label>
                                            @elseif($user->role_as=='0')
                                                <label class="badge btn-success" for="" >User</label>
                                            @else
                                                <label for="" class="badge btn-danger">None</label>
                                            @endif
                                         </td>
                                            <td>
                                                <a href="{{url('admin/users/' .$user->id. '/edit')}}" class="btn btn-success">Edit</a>
                                                <a href="{{url('admin/users/' .$user->id. '/delete')}}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Products Available</td>
                                        </tr>
                                    @endforelse
    
                                </tbody>
                        </table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
