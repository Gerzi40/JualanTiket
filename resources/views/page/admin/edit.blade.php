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

        .value {
            flex-grow: 1;
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
        <div >
            <input value="{{ $event->price }}" />
        </div>
    </div>
    <div class="detail-row">
        <div class="label">Location</div>
        <div >
            <input value="{{ $event->location }}" />
        </div>
    </div>
    <div class="detail-row">
        <div class="label">Date</div>
        <div >
            <input value="{{ $event->date }}" />
        </div>
    </div>
    <div class="detail-row">
        <div class="label">Time</div>
        <div >
            <input value="{{ $event->time }}" />
        </div>
    </div>
    <div class="detail-row">
        <div class="label">Description</div>
        <div class="value">
            <textarea rows="5" class="w-100">{{ $event->description }}</textarea>
        </div>
    </div>
    <div class="detail-row">
        <div class="label">Terms</div>
        <div class="value">
            <textarea rows="5" class="w-100">{{ $event->terms }}</textarea>
        </div>
    </div>
    <div class="detail-row">
        <div style="width: 25%;"></div>
        <div class="value">
            <button class="light-button">Submit</button>
        </div>
    </div>

@endsection
