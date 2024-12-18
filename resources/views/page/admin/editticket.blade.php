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

<div>
    <h1>Edit Ticket</h1>
</div>

<a href="{{ route('admin.manageTicket', ['id' => $ticket->event_id]) }}" class="light-button">
    Back
</a>

<div class="mt-5">
    <form action="{{ route('admin.editTicket') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $ticket->id }}" />
        <div class="detail-row">
            <div class="label">Category</div>
            <div >
                <input name="category" value="{{ $ticket->name }}" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Price</div>
            <div >
                <input name="price" type="number" value="{{ $ticket->price }}" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Deadline</div>
            <div >
                <input name="deadline" type="datetime-local" value="{{ $ticket->deadline->format('Y-m-d H:i') }}" min="{{ date('Y-m-d H:i') }}" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Stock</div>
            <div >
                <input name="stock" type="number" value="{{ $ticket->stock }}" />
            </div>
        </div>
        <div class="detail-row mt-5">
            <div style="width: 25%;"></div>
            <div class="value">
                <button class="light-button">Update</button>
            </div>
        </div>
    </form>
</div>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
@endsection