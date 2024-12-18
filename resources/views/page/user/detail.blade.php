@extends('layout.user.master')

@section('content')
    <div class="container-fluid mt-5 ">
        {{-- Image + detail --}}

        <div class="d-flex flex-wrap justify-content-center gap-5">
            <img src="/assets/events/event_test_image.png" alt="" class="" style="width: 25rem;">
            <div class="card" style="width: 30rem; height: 15rem;">
                <div class="card-body px-4">
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <div class="fs-6 mt-4">
                        <div class="d-flex flex-wrap gap-4 align-items-center mt-2">
                            <img src="/assets/icon/calender.png" alt="">
                            <p class="card-text">{{ $event->date->format('d M Y') }}</p>
                        </div>
                        <div class="d-flex flex-wrap gap-4 align-items-center mt-2">
                            <img src="/assets/icon/location.png" alt="">
                            <p class="card-text">{{ $event->location }}</p>
                        </div>
                        <div class="d-flex flex-wrap gap-4 align-items-center mt-2">
                            <img src="/assets/icon/time.png" alt="">
                            <p class="card-text">{{ $event->time }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Ticket Selection --}}
        <div class="mt-5">
            <form action="{{ route('user.makeTransaction') }}" method="POST">
                @csrf
                <input type="hidden" name="ticket_id" id="selected-ticket" value="">
                <input type="hidden" name="quantity" id="selected-quantity" value="1">

                <div class="d-flex flex-wrap justify-content-center gap-5">
                    @foreach ($tickets as $ticket)
                    @if($ticket->stock <= 0)
                    {{-- <div class="sold-out-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" 
                        style="background: rgba(0, 0, 0, 0.6); color: white; z-index: 10; font-size: 1.5rem;">
                        @lang('message.soldout')
                    </div> --}}
                    @endif
                    <div class="card ticket-option" data-ticket-id="{{ $ticket->id }}"
                        data-ticket-name="{{ $ticket->name }}" style="width: 30rem; height: 15rem; cursor: pointer;">
                        <div class="card-body px-4">
                            <h5 class="card-title">{{ $ticket->name }}</h5>
                            <div class="fs-6 mt-4">
                                <p class="card-text">Rp. {{ number_format($ticket->price, 2, ',', '.') }}</p>
                                <p class="card-text">@lang('message.end') {{ $ticket->deadline->format('d M Y') }} |
                                    {{ $ticket->deadline->format('H:i') }} WIB</p>
                                <div>
                                    <label for="quantity-{{ $ticket->id }}">@lang('message.ticketamount')</label>
                                    <input type="number" id="quantity-{{ $ticket->id }}" value="0"
                                        min="0" class="form-control ticket-quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-5 text-center">
                    <button type="submit" class="btn bg-o text-d" id="buy-button" disabled>@lang('message.buyticket')</button>
                </div>

            </form>

        </div>
        <div class="px-5">
            <h3>@lang('message.description')</h3>
            <p>{{ $event->description }}</p>
        </div>

        <div class="px-5">
            <h3>@lang('message.terms')</h3>
            <p>{{ $event->terms }}</p>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ticketOptions = document.querySelectorAll('.ticket-option');
        const selectedTicketInput = document.getElementById('selected-ticket');
        const selectedQuantityInput = document.getElementById('selected-quantity');
        const buyButton = document.getElementById('buy-button');

        ticketOptions.forEach(option => {
            option.addEventListener('click', function() {
                ticketOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');

                const ticketId = this.getAttribute('data-ticket-id');
                const quantityInput = this.querySelector('.ticket-quantity');

                selectedTicketInput.value = ticketId;
                selectedQuantityInput.value = quantityInput.value;

                buyButton.disabled = false;
            });
            option.querySelector('.ticket-quantity').addEventListener('change', function() {
                if (option.classList.contains('selected')) {
                    selectedQuantityInput.value = this.value;
                }
            });
        });
    });
</script>

<style>
    .ticket-option {
        border: 1px solid #ddd;
        transition: border-color 0.3s;
    }

    .ticket-option.selected {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    }

    * {
        margin: 0;
        padding: 0;
    }
</style>
