@extends('layout.master')

@section('content')
<div>
    <h1>{{$event->name}}</h1>
    <h2>{{$event->description}}</h2>
</div>
@endsection
