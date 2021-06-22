@extends('layouts.admin')
@section('title', 'Users List')

@section('content')

    <div class="row layout-top-spacing">
        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            @if (Session::has('success'))
                                <p class="alert alert-info">
                                    {{ Session::get('success') }}
                                </p>
                            @endif
                            <h4>Company List</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>Se</th>
                                    <th>Company</th>
                                    <th>Full Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    {{-- <th>Password</th> --}}

                                    <th class="text-center">Action</th>
                                    {{-- <th></th> --}}
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{$user->company->name? $user->company->company : '' }}
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->email}}</td>
                                    {{-- <td>{{$user->password}}</td> --}}

                                    <td class="text-center">
                                        <form action="{{route('user.destroy', $user->id)}}" method="POST">
                                            <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary">Edit </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>

                                    {{-- <td class="text-center"><span class="text-success">Complete</span></td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                @endsection
