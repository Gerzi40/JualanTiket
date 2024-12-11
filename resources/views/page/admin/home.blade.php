@extends('layout.admin.master')

@section('content')

    <h1>List Event</h1>
    <a href="{{ route('admin.add') }}" class="light-button">Add Event</a>
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
                        <a href="{{ route('admin.detail', ['id' => $event->id]) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('admin.edit', ['id' => $event->id]) }}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
