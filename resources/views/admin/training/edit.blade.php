@extends('layouts.admin')
@section('title', 'Edit Training')
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
                                    <h4>Training Details</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form action="{{route('training.update', $trainings->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                        <div class="form-group mb-3">
                                            <label for="company">Training Name</label>
                                            <input name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="sEmail"
                                                aria-describedby="emailHelp1" placeholder="" value="{{ old('name', $trainings->name) }}">
                                            @error('name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            {{-- <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="link">Language</label>
                                            <input name="language" type="text"
                                                class="form-control @error('language') is-invalid @enderror" id="sPassword"
                                                placeholder="" value="{{ old('language', $trainings->language) }}">
                                            @error('language')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="for">Health Plan</label>
                                            <input name="health" type="text"
                                                class="form-control @error('health') is-invalid @enderror" id="sPassword"
                                                placeholder="" value="{{ old('health',$trainings->health) }}">
                                            @error('health')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="for">Publish date</label>
                                            <input name="publish" type="date"
                                                class="form-control @error('publish') is-invalid @enderror" id="sPassword"
                                                placeholder="" value="{{ old('publish', $trainings->publish) }}">
                                            @error('publish')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="for">Due date</label>
                                            <input name="due" type="date"
                                                class="form-control @error('due') is-invalid @enderror" id="sPassword"
                                                placeholder="" value="{{ old('due', $trainings->due) }}">
                                            @error('due')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-4">

                                            <div class="form-check {{$errors->has('company') ? 'company' : ''}}">
                                            <h6>Select companies trainng applies to </h6>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="company[]" value="company1"
                                                {{ in_array('company1', $trainings->company) ? 'checked' : ''}}> company1
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="company[]" value="company2"
                                                {{ in_array('company2', $trainings->company) ? 'checked' : ''}}> company2
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="company[]" value="company3"
                                                {{ in_array('company3', $trainings->company) ? 'checked' : ''}} > company3
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="company[]" value="company4"
                                                {{ in_array('company4', $trainings->company) ? 'checked' : ''}}> company4
                                            </label>

                                            @error('company')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
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
