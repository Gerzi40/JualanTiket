@extends('layout.admin.master')

@section('content')
    <h1>Transaction</h1>

    <div class="gap"></div>

    {{-- <a href="{{ route('admin.add') }}" class="light-button">Add Event</a> --}}

    <div class="gap"></div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Event Name</th>
                <th scope="col">Ticket Category</th>
                <th scope="col">Ticket Price</th>
                <th scope="col">Total Ticket</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $t)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $t->event->name }}</td>
                    <td>{{ $t->ticketcategory->name }}</td>
                    <td>{{ $t->total_price }}</td>
                    <td>{{ $t->total_ticket }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
