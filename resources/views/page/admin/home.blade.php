@extends('layout.master')
 
@section('content')

    {{-- <p>Home</p> --}}

    <div class="bg-dark" style="width: 15%;">
        <div class="text-light py-5 text-center">
            Tiketin
        </div>
        <div class="bg-dark-subtle text-ligth py-2 px-3">List Event</div>
    </div>
    <div class="p-5" style="overflow-y: auto; width: 85%">
        <h1>List Event</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>
                        <button class="btn btn-primary">View</button>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>
                        <button class="btn btn-primary">View</button>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection