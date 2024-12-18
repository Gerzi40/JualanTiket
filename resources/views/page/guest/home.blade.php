@extends('layout.guest.master')

@section('content')
    {{-- Hero Section --}}
    <div class="container-fluid">
        <div class="card text-bg-dark">
            <img src="/assets/hero/img1.png" class="card-img" alt="...">
        </div>
    </div>

    {{-- Event List --}}
    <div class="container-fluid mt-5">
        <div class="d-flex flex-wrap gap-5 justify-content-center">
            @foreach ($events as $event)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset($event->image) }} " class="card-img-top" alt="ini image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{ $event->date->format('d M Y') }}</p>
                        <p class="card-text">{{ $event->location }}</p>
                        <p class="card-text">Rp. {{ number_format($event->price, 2, ',', '.') }}</p>
                        <a href="{{ route('eventDetail', ['id' => $event->id]) }}" class="btn"
                            style="background-color: #EF8354; color: #2D3142">@lang('message.detail')</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
