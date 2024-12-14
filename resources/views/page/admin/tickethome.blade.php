@extends('layout.admin.master')

@section('content')
    <h1>Ticket</h1>

    <div class="gap"></div>

    <a class="light-button">Add Ticket</a>

    <div class="gap"></div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $t)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $t->name }}</td>
                    <td>{{ $t->price }}</td>
                    <td>{{ $t->stock }}</td>
                    <td>
                        <button class="btn btn-primary">View</button>
                        <button class="btn btn-warning">Update</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
