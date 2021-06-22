@extends('layouts.admin')
@section('title', 'Add company')
@section('content')
 <!--  BEGIN CONTENT PART  -->
 <div id="content" class="main-content">
    <div class="layout-px-spacing">
{{--
        <div class="page-header">
            <div class="page-title">
                <h3>Company Details</h3>
            </div> --}}

            <div class="row">
                <div id="flStackForm" class="col-lg-6 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-6">

                                    @if(Session::has('success'))
                                    <p class="alert alert-info">{{ Session::get('success') }}</p>
                                    @endif
                                    <h4>Company Details</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="company">Company</label>
                                    <input name="company" type="text" class="form-control @error('company') is-invalid @enderror"
                                    id="sEmail" aria-describedby="emailHelp1" placeholder="" value="{{old('company')}}">
                                    @error('company')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                    {{-- <small id="emailHelp1" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                </div>
                                <div class="form-group mb-4">
                                    <label for="link">Website Link</label>
                                    <input name="link" type="text" class="form-control @error('link') is-invalid @enderror"
                                    id="sPassword" placeholder="" value="{{old('link')}}">
                                    @error('link')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="for">Select Logo</label>
                                    <input name="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                     id="sPassword"  onchange="showPreview(event)" >
                                     @error('image')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class = 'col-lg-6 bg-dark'>
                                    <div class="d-flex justify-content-center">
                                    <div>
                                      <h2 class="text-center text-white">Logo Image: </h2>
                                    {{-- image  --}}
                                    <img src="" alt="" {{-- javascript id --}}  id="editimg" class="rounded" style="height:100px; width:120px;"  >
                                    </div>

                                    </div>
                                      </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>

                            </div>
                            </div>

                            {{-- Javascript --}}
                            <script>

                                function showPreview(event){
                                 var output = document.getElementById('editimg');
                                 output.src = URL.createObjectURL(event.target.files[0]);
                               }

                               </script>

@endsection
