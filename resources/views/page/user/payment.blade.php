@extends('layout.user.master')

@section('content')
    <div class="container-fluid mt-3">
        {{-- upper div --}}
        <div class="d-flex justify-content-between">
            <div class="mx-auto text-d">
                <h1>@lang('message.detailorder')</h1>
            </div>
            {{-- <div class="d-flex align-items-center px-2" style="background-color: #EF8354; border-radius: 10px">
                <h3 class="fs-4">@lang('message.completepayment') 10:00</h3>
            </div> --}}
        </div>
        {{-- Form --}}
        <div>
            {{-- Payment + Detail --}}
            <div class="d-flex justify-content-center mt-4 ">

                {{-- Payment Details --}}
                <div class="border px-3 py-3"
                    style="border: 3px solid #2D3142 !important; border-radius: 10px; width: 32rem; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.4);">

                    <div class="">
                        {{-- Event Info --}}
                        <h2 class="text-d text-center">{{ $event->name }}</h2>
                        <div class="d-flex gap-4 align-items-center mt-2">
                            <img src="/assets/icon/calender.png" alt="">
                            <p class="card-text text-d">{{ $event->date->format('d M Y') }}</p>
                        </div>
                        <div class="d-flex gap-4 align-items-center mt-2">
                            <img src="/assets/icon/location.png" alt="">
                            <p class="card-text text-d">{{ $event->location }}</p>
                        </div>
                        <div class="d-flex gap-4 align-items-center mt-2">
                            <img src="/assets/icon/time.png" alt="">
                            <p class="card-text text-d">{{ $event->time }}</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        {{-- Ticket Info --}}
                        <h5 class="text-d">@lang('message.ticketinfo')</h5>
                        <div class="d-flex justify-content-between">
                            <p class="text-d">{{ $ticket->name }}</p>
                            <p class="text-d">{{ $quantity }}x</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        {{-- Ticket Price --}}
                        <div class="d-flex justify-content-between">
                            <p class="text-d">@lang('message.price')</p>
                            <p class="text-d">Rp. {{ number_format($ticketPrice, 2, ',', '.') }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="text-d">@lang('message.price')</p>
                            <p class="text-d">Rp. {{ number_format($adminFee, 2, ',', '.') }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="text-d">@lang('message.total')</p>
                            <p class="text-d">Rp. {{ number_format($totalPrice, 2, ',', '.') }}</p>
                        </div>
                    </div>
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                    <input type="hidden" name="quantity" value="{{ $quantity }}">
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <div class="d-flex justify-content-center mt-1">
                        <button type="submit" id="pay-button" class="btn px-4 bg-o text-d">@lang('message.pay')</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
    </script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            var snapToken = '{{ $transaction->snap_token }}';
            //   var changeStatusUrl = '{{ route('user.changeStatus', ['id' => $transaction->id]) }}';

            snap.pay(snapToken, {
                // Optional
                onSuccess: function(result) {
                    window.location.href = "{{ route('user.changeStatus', ['id' => $transaction->id]) }}";
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
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

    * {
        margin: 0;
        padding: 0;
    }
</style>
