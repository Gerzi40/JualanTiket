@extends('layout.user.master')

@section('content')
    {{$quantity}}
    <br>
    {{$ticket->name}}
    <br>
    {{$event->name}}
@endsection