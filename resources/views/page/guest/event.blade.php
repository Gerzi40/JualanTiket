@extends('layout.guest.master')

@section('content')
<div class="container-fluid">
    {{-- Sorting? --}}
    <div class="d-flex justify-content-end">
        <div class="">
            <p>Urutkan</p>
        </div>
    </div>
    {{-- Event List --}}
    <div class="mt-5">
        <div class="d-flex flex-wrap gap-5 justify-content-center">
            @foreach ($events as $event)
                <div class="card" style="width: 18rem;">
                    <img src="/assets/events/event_test_image.png" class="card-img-top" alt="ini image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{ $event->date }}</p>
                        <p class="card-text">{{ $event->location }}</p>
                        <p class="card-text">Rp.{{ number_format($event->price, 2, ',', '.') }}</p>
                        <a href="{{route('eventDetail', ['id' => $event->id])}}" class="btn btn-primary">Go Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        {{$events->links()}}
    </div>
</div>
@endsection