@extends('layout.guest.master')

@section('content')
<div class="m-5">

    <div class="row">
        <div class="border col-5">
            <img src="/assets/events/event1.jpg" class="w-100 h-100" />
        </div>
        <div class="card col-7">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $event->name }}</h5>
                <p class="card-text">{{ $event->date->format('j F Y') }}</p>
                <p class="card-text">{{ $event->location }}</p>
                <p class="card-text">{{ $event->time }}</p>
            </div>
        </div>
    </div>

    <br>

    <div>
        <div class="d-flex justify-content-between gap-3">
            @foreach ($tickets as $ticket)
                <div class="card flex-grow-1">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Ticket {{ $ticket->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">${{ $ticket->price }}</h6>
                        <input type="number" />
                    </div>
                </div>
            @endforeach
        </div>
    
        <br>
    
        <div>
            <a class="btn fw-bold" href="{{ route('login') }}" style="background-color: #EF8354; color: #2D3142;">Beli Tiket</a>
        </div>
    </div>

    <br>

    <div>
        <h1>Deskripsi</h1>
        <p>{{$event->description}}</p>
    </div>

    <div>
        <h1>Syarat & Ketentuan</h1>
        <li>ABCDEFG</li>
        <li>ABCDEFG</li>
        <li>ABCDEFG</li>
    </div>

</div>
@endsection
