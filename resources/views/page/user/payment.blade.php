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
        <div class="d-flex justify-content-between mt-5">
            {{-- Payment --}}
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
            <div class="border" style="border-radius: 10px;width: 34rem">
                {{-- Event Info --}}
                <div class="mt-2">
                    <h5 class="">{{$event->name}}</h5>
                    <div class="d-flex flex-wrap gap-4 align-items-center mt-2">
                        <img src="/assets/icon/calender.png" alt="">
                        <p class="card-text">{{$event->date->format('d M Y')}}</p>
                      </div>
                      <div class="d-flex flex-wrap gap-4 align-items-center mt-2">
                        <img src="/assets/icon/location.png" alt="">
                        <p class="card-text">{{$event->location}}</p>
                      </div>
                      <div class="d-flex flex-wrap gap-4 align-items-center mt-2">
                        <img src="/assets/icon/time.png" alt="">
                        <p class="card-text">{{$event->time}}</p>
                      </div>
                    </div>
                </div>
                {{-- Ticket Info --}}
                <br>
                <div>
                    <h5>Info Tiket</h5>
                </div>
            </div>
            
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentButtons = document.querySelectorAll('.payment-button');
        const hiddenInput = document.getElementById('payment-selected');
        console.log(paymentButtons);

        // Tambahkan event listener ke setiap tombol
        paymentButtons.forEach(button => {
            button.addEventListener('click', () => {
                paymentButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');
                hiddenInput.value = button.getAttribute('data-value');

                console.log(hiddenInput.value);
            });
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