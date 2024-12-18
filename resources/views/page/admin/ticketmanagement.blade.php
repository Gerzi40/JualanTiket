@extends('layout.admin.master')

@section('content')
<h1>{{$event->name}}</h1>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href="{{ route('admin.toAddTicket', ['id' => $event->id]) }}" class="light-button">Add Ticket</a>
<div class="">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Deadline</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $ticket->name }}</td>
                    <td>Rp. {{ number_format($ticket->price, 2, ',', '.') }}</td>
                    <td>{{ $ticket->deadline->format('d M Y') }} |
                        {{ $ticket->deadline->format('H:i') }} WIB</td>
                        <td>{{ $ticket->stock }}</td>
                    <td>
                        <a href="{{ route('admin.toEditTicket', ['id' => $ticket->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.deleteTicket', ['id' => $ticket->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- @foreach ($tickets as $ticket)
    <a href="{{ route('admin.toEdit', ['id' => $ticket->id])}}">
        <div class="card ticket-option" data-ticket-id="{{ $ticket->id }}"
            data-ticket-name="{{ $ticket->name }}" style="width: 30rem; height: 15rem; cursor: pointer;">
            <div class="card-body px-4">
                <h5 class="card-title">{{ $ticket->name }}</h5>
                <div class="fs-6 mt-4">
                    <p class="card-text">Rp.{{ number_format($ticket->price, 2, ',', '.') }}</p>
                    <p class="card-text">@lang('message.end') {{ $ticket->deadline->format('d M Y') }} |
                        {{ $ticket->deadline->format('H:i') }} WIB</p>
                    <div>
                        <label for="quantity-{{ $ticket->id }}">@lang('message.ticketamount')</label>
                            <p>{{ $ticket->stock }}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach --}}
</div>
@endsection