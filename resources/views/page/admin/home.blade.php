@extends('layout.admin.master')

@section('content')
    <h1>List Event</h1>

    <div class="gap"></div>

    <a href="{{ route('admin.add') }}" class="light-button">Add Event</a>

    <div class="gap"></div>

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
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $event->name }}</td>
                    <td>
                        <a href="{{ route('admin.detail', ['id' => $event->id]) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('admin.edit', ['id' => $event->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('api.event.delete', ['id' => $event->id]) }}" method="POST"
                            style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
