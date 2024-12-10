@extends('layout.admin.master')

@section('content')
    {{-- <p>Home</p> --}}

    <div class="p-5" style="overflow-y: auto; width: 85%">
        <h1>List Event</h1>
        {{-- <div>
            <div class="row">
                <div class="col-1">No</div>
                <div class="col">Name</div>
                <div class="col">Action</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-1">1</div>
                <div class="col">Mark</div>
                <div class="col">
                    <button class="btn btn-primary">View</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
            <div class="row">
                <div class="col-1">2</div>
                <div class="col">John</div>
                <div class="col">
                    <button class="btn btn-primary">View</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div> --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)    
                    <tr style="background-color: black">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $event->name }}</td>
                        <td>
                            <button class="btn btn-primary">View</button>
                            <button class="btn btn-warning">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
