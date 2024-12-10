@extends('layout.user.master')

@section('content')
    {{-- {{$quantity}}
    <br>
    {{$ticket->name}}
    <br>
    {{$event->name}} --}}
    <div class="container-fluid mt-3">
        {{-- upper div --}}
        <div class="d-flex justify-content-between">
            <div class="">
                <h1>Detail pemesanan</h1>
            </div>
            <div class="d-flex align-items-center px-2" style="background-color: #EF8354; border-radius: 10px">
                <h3 class="fs-4">Selesaikan Pembayaranmu Dalam 10:00</h3>
            </div>
        </div>
        {{-- Payment + Detail --}}
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-bottom justify-content-center" style="background-color: #8d8d8d; border-radius: 10px; width: 30rem;">
                <div class="">
                    <h3 class="fs-4">Metode Pembayaran</h3>
                    <div class="d-flex justify-content-center">
                        <p>____________________________________________________</p>
                    </div>
                </div>
            </div>
                <div>

                </div>
            <div>
        </div>
    </div>
@endsection