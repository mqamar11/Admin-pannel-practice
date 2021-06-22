@extends('layouts.admin')
@section('title', 'Company List')

@section('content')

<div class="row layout-top-spacing">
    <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        @if(Session::has('success'))
                        <p class="alert alert-info">{{ Session::get('success') }}</p>
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
                                <th>Name</th>
                                <th>Link</th>
                                <th>Logo</th>
                                <th class="text-center">Action</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company as $item)


                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->company}}</td>
                                <td>{{$item->link}}</td>
                                <td>
                                    <img src="{{url('uploads/',$item->image)}}" alt="" id="indeximg" class='rounded-circle'
                                     style="height:60px; width:80px " >
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('company.destroy',$item->id) }}" method="POST">
                                    <a href="{{route('company.edit', $item->id)}}" class="btn btn-primary">Edit </a>
                                    @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
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
                <a href="company/export/xl" class="btn btn-primary"> Export to Excel</a>
                <a href="company/export/pdf" class="btn btn-primary"> Export to pdf</a>

@endsection
