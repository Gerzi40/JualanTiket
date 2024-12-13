@extends('layout.user.master')

@section('content')
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
        {{-- Form --}}
        <form action="{{route('user.makeTransaction')}}" method="POST">
            @csrf
            {{-- Payment + Detail --}}
            <div class="d-flex justify-content-between mt-5">
                {{-- Payment Selection--}}
                <div class="border py-3" style="background-color: #F5F5F5; border-radius: 10px; width: 35rem; box-shadow: ">
                    {{-- Upper Div --}}
                        <div class="">
                            <div class="d-flex justify-content-center">
                                <h3 class="fs-4">Metode Pembayaran</h3>
                            </div>
                            <hr style="color: black; opacity: 1; border-width: 2px">
                        </div>
                    {{-- Payment Selection --}}
                    <div class="d-flex flex-wrap payment-options gap-4 justify-content-center">
                        <input type="hidden" name="payment-selected" id="payment-selected">
                        {{-- Default ada 3 --}}
                        <div class="payment-button" data-value="gopay">
                            <img src="/assets/payment/gopay.png" alt="Gopay">
                        </div>
                        <div class="payment-button" data-value="ovo">
                            <img src="/assets/payment/gopay.png" alt="OVO">
                        </div>
                        <div class="payment-button" data-value="shopee">
                            <img src="/assets/payment/gopay.png" alt="Shopee">
                        </div>
                    </div>
                </div>
                {{-- Payment Details --}}
                <div class="border px-3 py-3" style="border-radius: 10px; width: 32rem">
                    <div class="">
                        {{-- Event Info --}}
                        <h5>{{$event->name}}</h5>
                        <div class="d-flex gap-4 align-items-center mt-2">
                            <img src="/assets/icon/calender.png" alt="">
                            <p class="card-text">{{$event->date->format('d M Y')}}</p>
                        </div>
                        <div class="d-flex gap-4 align-items-center mt-2">
                            <img src="/assets/icon/location.png" alt="">
                            <p class="card-text">{{$event->location}}</p>
                        </div>
                        <div class="d-flex gap-4 align-items-center mt-2">
                            <img src="/assets/icon/time.png" alt="">
                            <p class="card-text">{{$event->time}}</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        {{-- Ticket Info --}}
                        <h5>Info Tiket</h5>
                        <div class="d-flex justify-content-between">
                            <p>{{$ticket->name}}</p>
                            <p>{{$quantity}}x</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        {{-- Ticket Price --}}
                        <div class="d-flex justify-content-between">
                            <p>Harga Tiket</p>
                            <p>Rp. {{ number_format($ticketPrice, 2, ',', '.') }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Harga Tiket</p>
                            <p>Rp. {{ number_format($adminFee, 2, ',', '.') }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Total</p>
                            <p>Rp. {{ number_format($totalPrice, 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                    <input type="hidden" name="quantity" value="{{$quantity}}">
                    <input type="hidden" name="total_price" value="{{$totalPrice}}">
                </div>
            </div>
            <div class="d-flex justify-content-end mr-5 mt-3">
                <button type="submit">Pay</button>
            </div>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentButtons = document.querySelectorAll('.payment-button');
        const hiddenInput = document.getElementById('payment-selected');
        const form = document.querySelector('form');


        // Tambahkan event listener ke setiap tombol
        paymentButtons.forEach(button => {
            button.addEventListener('click', () => {
                paymentButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');
                hiddenInput.value = button.getAttribute('data-value');

                console.log(hiddenInput.value);
            });
        });
        form.addEventListener('submit', function(event) {
        if (!hiddenInput.value) {
            event.preventDefault();
            alert('Silakan pilih metode pembayaran.');
        }
    });
    });
</script>

<style>
    .payment-button {
    border: 2px solid;
    padding: 10px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-align: center;
    margin: 5px;
}

.payment-button img {
    width: 120px;
    height: 50px;
    margin: 0 auto;
}

.payment-button:hover {
    border-color: #EF8354;
}

.payment-button.selected {
    border-color: #EF8354;
    background-color: #f0f0f0;
}
</style>