@extends('layouts.admin')
@section('title', 'Trainings List')

@section('content')

    <div class="row layout-top-spacing">
        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            @if (Session::has('success'))
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
                                    <th>Training Name</th>
                                    <th>Language</th>
                                    <th>Health Plan</th>
                                    <th>Pblish Date</th>
                                    <th>Due Date</th>
                                    <th>Companies</th>
                                    <th class="text-center">Action</th>
                                    {{-- <th></th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($trainings as $training)


                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $training->name }}</td>
                                        <td>{{ $training->language }}</td>
                                        <td>{{ $training->health }}</td>
                                        <td>{{ $training->publish }}</td>
                                        <td>{{ $training->due }}</td>
                                        <td>
                                            @foreach ($training->company as $list)
                                                {{ $list }} ,
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <form action="{{route('training.destroy', $training->id)}}" method="POST">
                                                <a href="{{route('training.edit', $training->id)}}" class="btn btn-primary">Edit </a>
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


                @endsection
