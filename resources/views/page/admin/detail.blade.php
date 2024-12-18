@extends('layout.admin.master')

@section('style')

    <style>

        .detail-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .label {
            position: relative;
            min-width: 25%;
        }

        .label:after {
            content: ':';
            position: absolute;
            right: 0;
        }

        img{
            max-width: 1000px;
        }

    </style>

@endsection

@section('content')

    <a href="{{ route('admin.home') }}" class="light-button">
        Back
    </a>

    <div class="gap"></div>

    <h1>{{ $event->name }}</h1>

    <div class="gap"></div>

    <div class="detail-row">
        <div class="label">Price</div>
        <div>Rp. {{ $event->price }}</div>
    </div>
    <div class="detail-row">
        <div class="label">Location</div>
        <div>{{ $event->location }}</div>
    </div>
    <div class="detail-row">
        <div class="label">Date</div>
        <div>{{ $event->date->format('j F Y') }}</div>
    </div>
    <div class="detail-row">
        <div class="label">Time</div>
        <div>{{ $event->time }}</div>
    </div>
    <div class="detail-row">
        <div class="label">Description</div>
        <div>{{ $event->description }}</div>
    </div>
    <div class="detail-row">
        <div class="label">Terms</div>
        <div style="white-space: pre;">{{ $event->terms }}</div>
    </div>
    <div class="detail-row">
        <div class="label">Poster</div>
        <img src={{ asset($event->image) }}>
    </div>

@endsection
