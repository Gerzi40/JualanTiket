@extends('layout.guest.master')

@section('content')
    <div class="container">
        <form class="d-flex flex-column gap-2" method="GET" action="{{ route('searchEvent') }}">
            @csrf
            <div class="d-flex gap-2 align-items-center">
                <input class="input-search form-control me-2" type="search" placeholder="@lang('message.search')" aria-label="Search"
                    name="inputSearch" value="{{ request()->input('inputSearch') }}">
                <button class="btn bg-o text-d" type="submit">@lang('message.search')</button>
            </div>

            <div class="d-flex gap-2 align-items-center">
                <label for="sort" class="m-0 text-d fw-bold">@lang('message.sort'):</label>
                <select id="sort" name="sort" class="form-select form-select-sm bg-o text-d border-0"
                    style="width: auto;" onchange="this.form.submit()">
                    <option value="" class="text-d">-- @lang('message.sort') --</option>
                    <option value="name" class="text-d" @if (request()->sort == 'name') selected @endif>
                        @lang('message.name')
                    </option>
                    <option value="price" class="text-d" @if (request()->sort == 'price') selected @endif>
                        @lang('message.price')
                    </option>
                    <option value="date" class="text-d" @if (request()->sort == 'date') selected @endif>
                        @lang('message.date')
                    </option>
                </select>
            </div>
        </form>


        {{-- Event List --}}
        <div class="mt-4 mb-4">
            <div class="d-flex flex-wrap gap-5 justify-content-center">
                @foreach ($events as $event)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($event->image) }}" class="card-img-top" alt="ini image"
                            style="height:160px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text">{{ $event->date->format('d M Y') }}</p>
                            <p class="card-text">{{ $event->location }}</p>
                            <hr>
                            <p class="card-text">Rp. {{ number_format($event->price, 2, ',', '.') }}</p>
                            <a href="{{ route('eventDetail', ['id' => $event->id]) }}" class="btn mt-auto"
                                style="background-color: #EF8354; color: #2D3142">@lang('message.detail')</a>
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
