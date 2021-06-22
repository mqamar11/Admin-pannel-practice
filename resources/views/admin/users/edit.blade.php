@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')
    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            {{-- <div class="page-header">
            <div class="page-title">
                <h3>Company Details</h3>
            </div> --}}

            <div class="row">
                <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-md-12">

                                    @if (Session::has('success'))
                                        <p class="alert alert-info">{{ Session::get('success') }}</p>
                                    @endif
                                    <h4>Add User</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form action="{{route('user.update', $users->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group mb-3 col-6">
                                        <label for="company">Select Company</label>
                                        <select class="" name="company_id" id="" aria-label="Default select example">
                                            <option value="" disabled selected>Select</option>
                                            <option value="{{$company->id}}" {{ $users->company_id == 1 ? 'selected' : '' }}>company1</option>
                                            <option value="{{$company->id}}" {{ $users->company_id == 2 ? 'selected' : '' }}>company2</option>
                                            <option value="{{$company->id}}" {{ $users->company_id == 3 ? 'selected' : '' }}>company3</option>
                                            <option value="{{$company->id}}" {{ $users->company_id == 4 ? 'selected' : '' }}>company4</option>
                                        </select>

                                        {{-- <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <div class="form-group mb-4">
                                                <label for="">Select Role</label>
                                                <select name="role" id="">
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="super_admin" {{ $users->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                                    <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="form-group mb-3">
                                            <label for="name">Full Name</label>
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="sEmail"
                                                aria-describedby="emailHelp1" placeholder="" value="{{ old('name', $users->name) }}">
                                            @error('name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="email">Email</label>
                                            <input name="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="sPassword"
                                                placeholder="" value="{{ old('email', $users->email) }}">
                                            @error('email')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="form-group mb-3">
                                            <label for="password">Password</label>
                                            <input name="password" type="text"
                                                class="form-control @error('password') is-invalid @enderror" id="sEmail"
                                                aria-describedby="emailHelp1" placeholder="" value="{{$users->password}}">
                                            @error('password')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                @endsection
