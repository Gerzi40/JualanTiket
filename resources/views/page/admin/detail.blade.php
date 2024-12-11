@extends('layout.admin.master')

@section('content')

    <a href="{{ route('admin.home') }}" class="light-button">
        Back
    </a>
    <h1>Detail</h1>
    <p>{{ $event->id }}</p>

@endsection
