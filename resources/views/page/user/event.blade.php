@extends('layout.user.master')

@section('content')
    <div class="container">
        <div class="p-4 mb-4 bg-d">
            <form class="d-flex me-auto" role="search" method="POST" action="{{ route('user.userSearchEvent') }}">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="inputSearch">
                <button class="btn bg-o text-d" type="submit">Search</button>
            </form>
        </div>

        {{-- Sorting? --}}
        <div class="d-flex justify-content-end">
            <form class="d-flex gap-2">
                <p class="m-0">Urutkan: </p>
                <select name="sort" onchange="this.form.submit()">
                    <option value="">-- Sort --</option>
                    <option value="name">Name</option>
                    <option value="price">Price</option>
                    <option value="date">Date</option>
                </select>
            </form>
        </div>
        {{-- Event List --}}
        <div class="mt-5">
            <div class="d-flex flex-wrap gap-5 justify-content-center">
                @foreach ($events as $event)
                    <div class="card" style="width: 18rem;">
                        <img src="/assets/events/event_test_image.png" class="card-img-top" alt="ini image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text">{{ $event->date->format('d M Y') }}</p>
                            <p class="card-text">{{ $event->location }}</p>
                            <hr>
                            <p class="card-text">Rp.{{ number_format($event->price, 2, ',', '.') }}</p>
                            <a href="{{ route('user.userEventDetail', ['id' => $event->id]) }}" class="btn"
                                style="background-color: #EF8354; color: #2D3142">Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            {{ $events->links() }}
        </div>
    </div>
@endsection
