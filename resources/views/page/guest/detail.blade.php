@extends('layout.guest.master')

@section('content')
<div class="m-5">

    <div class="d-flex gap-5">
        <div class="w-50 border">Image</div>
        <div class="card w-50">
            <div class="card-body">
                <h5 class="card-title">{{ $event->name }}</h5>
                <h6 class="card-text">{{ $event->date->format('j F Y') }}</h6>
                <p class="card-text">{{ $event->location }}</p>
                <p class="card-text">{{ $event->time }}</p>
            </div>
        </div>
    </div>

    <br>

    <form>
        <div class="d-flex justify-content-between gap-3">
            @foreach ($tickets as $ticket)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ticket->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">${{ $ticket->price }}</h6>
                        <input type="number" />
                    </div>
                </div>
            @endforeach
        </div>
    
        <br>
    
        <div>
            <button class="btn btn-primary">Beli Tiket</button>
        </div>
    </form>

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
