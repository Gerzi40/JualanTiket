@extends('layout.user.master')

@section('content')
    <div class="container-fluid mt-5">
        {{-- Image + detail --}}
        <div class="d-flex flex-wrap justify-content-center gap-5">
            <img src="{{ asset($event->image) }}" alt="test" class="" style="width: 25rem;">
            <div class="card"
                style="width: 30rem; height: 15rem; border: 3px solid #2D3142 !important; border-radius: 10px; box-shadow: 5px 5px 8px rgba(0, 0, 0, 0.2);">
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
                        <div class="card ticket-option "
                            style="width: 30rem; height: 15rem; cursor: pointer; border-radius: 10px"
                            data-ticket-id="{{ $ticket->id }}" data-ticket-name="{{ $ticket->name }}">
                            <div class="card-body px-4">
                                <h5 class="card-title text-d">{{ $ticket->name }}</h5>
                                <div class="fs-6 mt-4">
                                    <p class="card-text text-d">Rp. {{ number_format($ticket->price, 2, ',', '.') }}</p>
                                    <p class="card-text text-d">@lang('message.end') {{ $ticket->deadline->format('d M Y') }}
                                        |
                                        {{ $ticket->deadline->format('H:i') }} WIB</p>
                                    <div>
                                        <label for="quantity-{{ $ticket->id }}" class="text-d">@lang('message.ticketamount')</label>
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

        {{-- Description & Terms --}}
        <div class="container mt-5">
            <div>
                <h3 class="text-d">@lang('message.description')</h3>
                <p class="text-d">{{ $event->description }}</p>
            </div>
            <div class="mt-4">
                <h3 class="text-d">@lang('message.terms')</h3>
                <p class="text-d">{{ $event->terms }}</p>
            </div>
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
        border: 1px solid #2D3142;
        transition: border-color 0.3s;
    }

    .ticket-option.selected {
        border-color: #EF8354;
        box-shadow: 5px 5px 10px rgba(239, 131, 84, 0.4);
    }

    .form-control.ticket-quantity:focus {
        border-color: #EF8354;
        box-shadow: 0 0 10px rgba(239, 131, 84, 0.1);
    }


    * {
        margin: 0;
        padding: 0;
    }
</style>
